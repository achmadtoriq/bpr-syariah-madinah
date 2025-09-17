function pemegangSahamForm() {
    return {
        csrf: '<?= csrf_hash() ?>',
        message: '',
        imageFile: null,
        imageUrl: '',
        cropper: null,
        form: {
            role: '',
            jabatan: '',
            nama: '',
            kewarganegaraan: '',
            tempat_lahir: '',
            tanggal_lahir: '',
            pendidikan: [''],
            pengalaman_kerja: [''],
            pelatihan: ['']
        },

        handleFile(event) {
            const file = event.target.files[0];
            if (!file) return;

            this.imageUrl = URL.createObjectURL(file);

            this.$nextTick(() => {
                if (this.cropper) this.cropper.destroy();

                this.cropper = new Cropper(this.$refs.image, {
                    aspectRatio: 3 / 4,
                    viewMode: 1,
                    autoCropArea: 1,
                });
            });
        },

        // ✅ jadikan Promise supaya bisa ditunggu
        cropImage() {
            return new Promise((resolve, reject) => {
                if (!this.cropper) return resolve(null);

                const canvas = this.cropper.getCroppedCanvas();
                canvas.toBlob((blob) => {
                    if (!blob) return reject('Gagal membuat blob dari canvas');

                    let nama = this.form.nama ?
                        this.form.nama.trim()
                        .replace(/[.,]/g, '_')
                        .replace(/\s+/g, '_')
                        .replace(/[^a-zA-Z0-9_]/g, '') :
                        'cropped';

                    let fileName = `${nama}.png`;

                    this.imageFile = new File([blob], fileName, {
                        type: "image/png"
                    });

                    this.imageUrl = canvas.toDataURL();
                    this.cropper.destroy();
                    this.cropper = null;

                    resolve(this.imageFile);
                }, "image/png");
            });
        },

        resetImage() {
            this.imageFile = null;
            this.imageUrl = '';
            if (this.cropper) {
                this.cropper.destroy();
                this.cropper = null;
            }
            this.$refs.fileInput.value = null;
        },

        addField(field) {
            this.form[field].push('');
        },

        removeField(field, index) {
            this.form[field].splice(index, 1);
        },
        deleteDocument(id) {
            if (!confirm("Yakin ingin menghapus baris ini?")) return;

            fetch(`/managemen/delete/${id}`, {
                    method: "DELETE",
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === "success") {
                        location.reload()
                    } else {
                        alert(data.message);
                    }
                })
                .catch((err) => alert("Terjadi kesalahan: " + err));
        },

        async submitForm() {
            try {
                await this.cropImage();

                let formData = new FormData();
                formData.append('<?= csrf_token() ?>', this.csrf);

                if (this.imageFile) {
                    formData.append('image', this.imageFile);
                }

                for (const key in this.form) {
                    if (Array.isArray(this.form[key])) {
                        this.form[key].forEach(v => formData.append(key + '[]', v));
                    } else {
                        formData.append(key, this.form[key]);
                    }
                }

                const res = await fetch('/managemen/store', {
                    method: 'POST',
                    body: formData
                });

                const result = await res.json();

                if (result.status === 'success') {
                    this.message = result.message;
                    this.csrf = result.csrf;
                    this.resetImage();
                    this.form = {
                        role: '',
                        jabatan: '',
                        nama: '',
                        kewarganegaraan: '',
                        tempat_lahir: '',
                        tanggal_lahir: '',
                        pendidikan: [''],
                        pengalaman_kerja: [''],
                        pelatihan: ['']
                    };

                    // ⏱ Reload setelah 3 detik
                    setTimeout(() => history.back(), 1000);
                }
            } catch (err) {
                this.message = 'Terjadi kesalahan saat menyimpan';
            }
        }
    }
}