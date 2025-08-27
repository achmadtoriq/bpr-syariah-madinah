<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tree View - ApexTree.js</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/apextree/apextree.js@master/dist/css/apextree.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/apextree"></script>

    <style>
        body {
            font-family: sans-serif;
            padding: 2rem;
        }

        #tree {
            margin-top: 2rem;
        }
    </style>
</head>

<body>

    <h2>Struktur Kategori</h2>
    <div id="svg-tree"></div>

    <script>
        // fetch("<?= base_url('tree/data') ?>")
        //     .then(res => res.json())
        //     .then(data => {
        //         const tree = new ApexTree({
        //             target: document.getElementById('tree'),
        //             data: data
        //         });
        //     });
        const data = {
            id: 'ms',
            data: {
                imageURL: 'https://i.pravatar.cc/300?img=68',
                name: 'Margret Swanson',
            },
            options: {
                nodeBGColor: '#cdb4db',
                nodeBGColorHover: '#cdb4db',
            },
            children: [{
                    id: 'mh',
                    data: {
                        imageURL: 'https://i.pravatar.cc/300?img=69',
                        name: 'Mark Hudson',
                    },
                    options: {
                        nodeBGColor: '#ffafcc',
                        nodeBGColorHover: '#ffafcc',
                    },
                    children: [{
                            id: 'kb',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=65',
                                name: 'Karyn Borbas',
                            },
                            options: {
                                nodeBGColor: '#f8ad9d',
                                nodeBGColorHover: '#f8ad9d',
                            },
                        },
                        {
                            id: 'cr',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=60',
                                name: 'Chris Rup',
                            },
                            options: {
                                nodeBGColor: '#c9cba3',
                                nodeBGColorHover: '#c9cba3',
                            },
                        },
                    ],
                },
                {
                    id: 'cs',
                    data: {
                        imageURL: 'https://i.pravatar.cc/300?img=59',
                        name: 'Chris Lysek',
                    },
                    options: {
                        nodeBGColor: '#00afb9',
                        nodeBGColorHover: '#00afb9',
                    },
                    children: [{
                            id: 'Noah_Chandler',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=57',
                                name: 'Noah Chandler',
                            },
                            options: {
                                nodeBGColor: '#84a59d',
                                nodeBGColorHover: '#84a59d',
                            },
                        },
                        {
                            id: 'Felix_Wagner',
                            data: {
                                imageURL: 'https://i.pravatar.cc/300?img=52',
                                name: 'Felix Wagner',
                            },
                            options: {
                                nodeBGColor: '#0081a7',
                                nodeBGColorHover: '#0081a7',
                            },
                        },
                    ],
                },
            ],
        };
        const options = {
            contentKey: 'data',
            width: 800,
            nodeWidth: 150,
            nodeHeight: 100,
            fontColor: '#fff',
            borderColor: '#333',
            childrenSpacing: 50,
            siblingSpacing: 20,
            direction: 'top',
            nodeTemplate: (content) =>
                `<div style='display: flex;flex-direction: column;gap: 10px;justify-content: center;align-items: center;height: 100%;'>
          <img style='width: 50px;height: 50px;border-radius: 50%;' src='${content.imageURL}' alt='' />
          <div style="font-weight: bold; font-family: Arial; font-size: 14px">${content.name}</div>
         </div>`,
            canvasStyle: 'border: 1px solid black;background: #f6f6f6;',
            enableToolbar: true,
        };
        const tree = new ApexTree(document.getElementById('svg-tree'), options);
        tree.render(data);
    </script>

</body>

</html>