<?php 
    session_start();
    include_once __DIR__ . "/config/database.php";


    if (!isset($_SESSION['adminid'])) {
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>

        <!-- DataTables CSS CDN  -->
        <link href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" rel="stylesheet" />
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a id="logout" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <?php include_once "sidenav.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Newest Cars</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Newest Cars</li>
                        </ol>
                        
                        <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createmodal">Create</a>

                        <!-- Modal -->
                        <div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create newest car</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="createForm" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="carImage" class="form-label">Car Image</label>
                                        <input type="file" id="car_img" class="form-control">
                                        <img src="" id="imgPreview" style="width: 100%;" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="carName" class="form-label">Car Name</label>
                                        <input type="text" id="car_name" class="form-control" placeholder="car name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="carName" class="form-label">Car Description</label>
                                        <textarea id="car_desc" class="form-control" placeholder="car description"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                            
                            </div>
                        </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body table-responsive">
                                <table id="newestCarsTable">
                                    <thead>
                                        <tr>
                                            <th>Car Image</th>
                                            <th>Name</th>
                                            <th>Desc</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        
                                    </tbody>
                                </table>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="false" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="carImage" class="form-label">Car Image</label>
                                                    <input type="file" id="edit_car_img" class="form-control">
                                                    <input type="hidden" id="edit_car_id" value="<?= $car['id']; ?>">
                                                    <input type="hidden" id="edit_car_oldimg" value="<?= $car['car_img']; ?>">
                                                    <img id="editImgPreview" style="width: 100%;" alt="">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="carName" class="form-label">Car Name</label>
                                                    <input type="text" id="edit_carname" class="form-control" placeholder="car name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="carName" class="form-label">Car Description</label>
                                                    <textarea id="edit_cardesc" class="form-control" placeholder="car description"></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal -->

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/datatables-simple-demo.js"></script> -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

        <script>
            $(document).ready(function () {

                // Fetch data to table
                let newestCarsTable = $('#newestCarsTable').DataTable({
                    ajax: {
                        url: 'newest-cars-fetch.php',  // Replace with your server-side URL
                        type: 'GET',  // Use GET or POST depending on your API
                        dataSrc: 'data'   // Define the key to use for data. If the response is a plain array, use an empty string
                    },
                    columns: [
                        { 
                            data: 'car_img',
                            render: function(data, type, row) {
                                return `<img src="../assets/uploads/${data}" alt="Car Image" style="width: 100px; height: auto;">`;
                            }

                         },
                        { data: 'car_name' },
                        { 
                            data: 'car_desc',
                            render: function(data, type, row) {
                                // Limit the number of words to 20 (or any number you prefer)
                                let truncated = data.length > 50 ? data.substr(0, 50) + '...' : data;
                                return truncated;
                            }
                         },
                        { 
                            data: null,
                            render: function(data, type, row) {
                                return `
                                    <div class='btn-group' role='group'>
                                        <a href="#" id="editBtn" data-edit-id="${row['id']}" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</a>
                                        <a href="#" id="deleteBtn" data-delete-id="${row['id']}" class="btn btn-danger">Delete</a>
                                    </div>  
                                `;
                            },
                            orderable: false
                         },
                        // Add more columns as necessary
                    ],
                    // Additional DataTables options
                    processing: true,  // Show processing indicator
                    serverSide: true,  // Enable server-side processing
                    responsive: true,  // Make the table responsive
                    paging: true,      // Enable pagination
                    searching: true,   // Enable searching
                    ordering: true,    // Enable ordering
                    pageLength: 10, // Set the number of entries to display per page
                });
                
                $("#logout").on("click", function () {
                    $.ajax({
                        type: "POST",
                        url: "logout.php",
                        dataType: "json",
                        success: function (response) {
                            if (response.status === "success") {
                                window.location.href = "login.php";
                            }
                        }
                    });
                });

                // Create
                $('#createForm').on('submit', function(e) {
                    e.preventDefault();  // Prevent the default form submission

                    let formData = new FormData();  // Create a FormData object with the form data
                    
                    let carImage = $("#car_img")[0].files[0];
                    let carName = $("#car_name").val();
                    let carDesc = $("#car_desc").val();

                    formData.append("car_img", carImage);
                    formData.append("car_name", carName);
                    formData.append("car_desc", carDesc);

                    $.ajax({
                        url: 'newest-cars-create.php',  // Server-side script to handle the upload
                        type: 'POST',
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Data inserted successfully',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(result => {
                                    if (result.isConfirmed) {
                                        $('.btn-close').click();
                                        newestCarsTable.ajax.reload(null, false); // 'null' to keep settings, 'false' to prevent page reset
                                        $('#createForm')[0].reset();
                                        $('#imgPreview').attr('src', '');
                                    }
                                });
                            } else {
                                console.log(response);  // Log server response for debugging
                            }
                        },
                        error: function(err) {
                            console.error(err);  // Log errors for debugging
                        }
                    });
                });

                // Image preview before upload
                $('#car_img').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imgPreview').attr('src', e.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                // Fetch data to the edit modal
                $(document).on('click', '#editBtn', function () {
                    let carId = $(this).data('edit-id'); // Get the car ID from the data-id attribute
                    console.log(carId);

                    // Send an AJAX request to fetch the car data
                    $.ajax({
                        url: 'newest-cars-edit-modal.php',  // Your server-side script to fetch car details
                        type: 'POST',
                        data: { id: carId },  // Send the car ID to the server
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                // Populate the modal fields with the fetched data
                                $('#edit_car_id').val(response.data.id); // Set the hidden car ID field
                                $('#edit_car_oldimg').val(response.data.car_img); // Set the hidden old image field
                                $('#edit_carname').val(response.data.car_name); // Set car name
                                $('#edit_cardesc').val(response.data.car_desc); // Set car description
                                $('#editImgPreview').attr('src', '../assets/uploads/' + response.data.car_img); // Set image preview
                            } else {
                                console.error('Error fetching car data.');
                            }
                        },
                        error: function(err) {
                            console.error('AJAX error:', err);
                        }
                    });
                });

                // Edit Image preview before upload
                $('#editfile').on('change', function() {
                    var file = this.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#editImgPreview').attr('src', e.target.result).show();
                        }
                        reader.readAsDataURL(file);
                    }
                });

                // Update Function
                $('#editForm').on('submit', function(e) {
                    e.preventDefault();  // Prevent the default form submission

                    let formData = new FormData();  // Create a FormData object with the form data
                    
                    let carId = $("#edit_car_id").val();
                    let carImg = $("#edit_car_img")[0].files[0];
                    let carName = $("#edit_carname").val();
                    let carDesc = $("#edit_cardesc").val();
                    let carOldimg = $("#edit_car_oldimg").val();

                    formData.append("edit_car_id", carId);
                    formData.append("edit_car_img", carImg);
                    formData.append("edit_carname", carName);
                    formData.append("edit_cardesc", carDesc);
                    formData.append("edit_car_oldimg", carOldimg);

                    $.ajax({
                        url: 'newest-cars-edit.php',  // Server-side script to handle the upload
                        type: 'POST',
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire({
                                    title: 'success!',
                                    text: 'Data updated successfully',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(result => {
                                    if (result.isConfirmed) {
                                        $('.btn-close').click();
                                        newestCarsTable.ajax.reload(null, false);
                                        // window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Hmmm!',
                                    text: 'No changes made',
                                    icon: 'warning',
                                    confirmButtonText: 'OK'
                                });
                                console.log(response);  // Log server response for debugging
                            }
                        },
                        error: function(err) {
                            console.error(err);  // Log errors for debugging
                        }
                    });
                });

                // Delete Function
                $(document).on('click', '#deleteBtn', function(e) {
                    e.preventDefault(); // Prevent default action

                    // Get the car ID from the data-delete-id attribute
                    let carId = $(this).data('delete-id');
                    
                    // Show confirmation before deleting
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send AJAX request to delete the car
                            $.ajax({
                                url: 'newest-cars-delete.php',  // PHP script to handle the deletion
                                type: 'POST',
                                data: { id: carId },  // Send the car ID
                                dataType: "json",
                                success: function(response) {
                                    console.log(response);
                                    if (response.status === 'success') {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Data successfully deleted.',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(result => {
                                            newestCarsTable.ajax.reload(null, false);
                                            // window.location.reload();
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error deleting car:', error);
                                    alert('An error occurred while deleting the car.');
                                }
                            });
                        }
                    });
                });

            });
        </script>
    </body>
</html>