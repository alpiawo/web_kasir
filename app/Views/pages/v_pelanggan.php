<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/sweetalert/package/dist/sweetalert2.all.min.css">
    <title>Alpi-Web</title>
    <style>
        * {
            margin: 0px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-dark mb-5">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Data Pelanggan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div class="navbar-nav">
                    <!-- <a class="nav-link text-light" aria-current="page" href="#">Home</a> -->
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-end mb-5">
            <a id="alertButton" class="btn btn-primary px-3 py-2" href="#" role="button"><i class="fas fa-cart-shopping"></i> Add Pelanggan</a>
        </div>
        <div class="">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless table-primary align-middle table-lg" id="customerTable">
                    <thead class="table-dark p-2">
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="customerBody">
                        <!-- Data pelanggan akan ditambahkan di sini -->
                    </tbody>
                </table>
            </div>
        </div>
        
        <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/sweetalert/package/dist/sweetalert2.all.min.js"></script>

        <script>
        document.getElementById("alertButton").addEventListener("click", function() {
            Swal.fire({
                title: 'Tambah Pelanggan',
                html: `
                    <input id="name" class="swal2-input" placeholder="Nama">
                    <input id="address" class="swal2-input" placeholder="Alamat">
                    <input id="phone" class="swal2-input" placeholder="Telepon">
                `,
                showCancelButton: true,
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Batal',
                focusConfirm: false,
                preConfirm: () => {
                    const name = document.getElementById('name').value;
                    const address = document.getElementById('address').value;
                    const phone = document.getElementById('phone').value;
                    if (!name || !address || !phone) {
                        Swal.showValidationMessage(`Silakan isi semua kolom!`);
                    }
                    return { name: name, address: address, phone: phone };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const newRow = document.createElement('tr');
                    newRow.classList.add('table-light');
                    newRow.innerHTML = `
                        <td scope="row">${document.querySelectorAll('#customerBody tr').length + 1}</td>
                        <td>${result.value.name}</td>
                        <td>${result.value.address}</td>
                        <td>${result.value.phone}</td>
                    `;
                    document.getElementById('customerBody').appendChild(newRow);
                    Swal.fire('Berhasil!', 'Pelanggan berhasil ditambahkan.', 'success');
                }
            });
        });
        </script>
    </div>
</body>
</html>