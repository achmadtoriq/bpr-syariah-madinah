function fileUpload() {
  return {
    Name: "",
    fileName: "",
    message: "",
    status: "",
    loading: false,
    loadingDownload: null,
    category: '',

    checkFile() {
      const file = this.$refs.fileInput.files[0];
      if (!file) return;

      // ✅ Validasi tipe file di sisi client
      if (file.type !== "application/pdf") {
        this.message = "Hanya file PDF yang diperbolehkan.";
        this.status = "error";
        this.fileName = "";
        this.$refs.fileInput.value = ""; // reset input
        return;
      }

      this.fileName = file.name;
      this.message = "";
      this.status = "";
    },

    async uploadFile() {
      const file = this.$refs.fileInput.files[0];

      if(this.Name == '') {
        this.message = "Nama file harus di isi.";
        this.status = "error";
        return;
      }

      if(this.category == '') {
        this.message = "Category harus di pilih.";
        this.status = "error";
        return;
      }

      if (!file) {
        this.message = "Pilih file PDF terlebih dahulu.";
        this.status = "error";
        return;
      } 

      this.loading = true;
      this.message = "";

      const formData = new FormData();
      formData.append("name", this.Name);
      formData.append("type", this.category)
      formData.append("file", file);

      try {
        const res = await fetch("/docs-upload/store", {
          method: "POST",
          body: formData,
        });

        const data = await res.json();
        this.status = data.status;
        this.message = data.message;

        if (data.status === "success") {
          // ✅ Reset form setelah sukses
          this.$refs.fileInput.value = "";
          this.fileName = "";
          this.Name = "";

          fetch("/docs-upload/refresh")
            .then((res) => res.text())
            .then((html) => {
              document.getElementById("tableContainer").innerHTML = html;
            });

          // ✅ Sembunyikan pesan setelah 3 detik
          setTimeout(() => {
            this.message = "";
            this.status = "";
          }, 3000);
        }
      } catch (err) {
        console.log(err);
        this.status = "error";
        this.message = "Terjadi kesalahan saat upload.";
      } finally {
        this.loading = false;
      }
    },

    deleteDocument(id) {
      if (!confirm("Yakin ingin menghapus dokumen ini?")) return;

      fetch(`/docs-upload/delete/${id}`, {
        method: "DELETE",
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.status === "success") {
            // Reload tabel
            fetch("/docs-upload/refresh")
              .then((res) => res.text())
              .then((html) => {
                document.getElementById("tableContainer").innerHTML = html;
              });
          } else {
            alert(data.message);
          }
        })
        .catch((err) => alert("Terjadi kesalahan: " + err));
    },

    async downloadFile(path) {
      try {
        this.loadingDownload = path;

        // Ambil file dari server
        const res = await fetch(`/${path}`, {
          method: "GET",
        });

        if (!res.ok) {
          throw new Error("File tidak ditemukan");
        }

        const blob = await res.blob();
        const url = window.URL.createObjectURL(blob);

        // Buat <a> element untuk download
        const a = document.createElement("a");
        a.href = url;
        a.download = path.split("/").pop(); // ambil nama file dari path
        document.body.appendChild(a);
        a.click();

        // Bersihkan
        window.URL.revokeObjectURL(url);
        a.remove();
      } catch (err) {
        alert("Gagal download file: " + err.message);
      } finally {
        this.loadingDownload = null;
      }
    },
  };
}
