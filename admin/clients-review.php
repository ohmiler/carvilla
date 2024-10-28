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
                        <h1 class="mt-4">Clients Review</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Clients Review</li>
                        </ol>
                        
                        <a href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createmodal">Create</a>

                        <!-- Create Modal -->
                        <div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create clients review</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true" aria-label="Close"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="createForm" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="clientImg" class="form-label">Client Image</label>
                                            <input type="file" id="client_img" class="form-control">
                                            <img src="" id="imgPreview" style="width: 100%;" alt="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="clientMsg" class="form-label">Client Message</label>
                                            <textarea id="client_msg" class="form-control" placeholder="client review message"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="clientName" class="form-label">Client Name</label>
                                            <input type="text" id="client_name" class="form-control" placeholder="client name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="clientCity" class="form-label">Client City</label>
                                            <input type="text" id="client_city" class="form-control" placeholder="client city">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </form>
                                </div>
                                <!-- Modal body -->
                            </div>
                        </div>
                        <!-- Create Modal -->

                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body table-responsive">
                                <table id="clientsReviewTable">
                                    <thead>
                                        <tr>
                                            <th>Client Image</th>
                                            <th>Client Message</th>
                                            <th>Client Name</th>
                                            <th>Client City</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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
                                                        <label for="clientImg" class="form-label">Client Image</label>
                                                        <input type="file" id="edit_client_img" class="form-control">
                                                        <input type="hidden" id="edit_client_id">
                                                        <input type="hidden" id="edit_client_oldimg">
                                                        <img id="editImgPreview" style="width: 100%;" alt="">
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="clientMsg" class="form-label">Client Message</label>
                                                        <textarea id="edit_client_msg" class="form-control" placeholder="client review message"></textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="clientName" class="form-label">Client Name</label>
                                                        <input type="text" id="edit_client_name" class="form-control" placeholder="client name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="clientCity" class="form-label">Client City</label>
                                                        <input type="text" id="edit_client_city" class="form-control" placeholder="client city">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Create</button>
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
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script> -->
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

        <script>
            $(document).ready(function () {

                // Fetch data to table 
                let clientsReviewTable = $('#clientsReviewTable').DataTable({
                    ajax: {
                        url: 'clients-review-fetch.php',  // Replace with your server-side URL
                        type: 'GET',  // Use GET or POST depending on your API
                        dataSrc: 'data'   // Define the key to use for data. If the response is a plain array, use an empty string
                    },
                    columns: [
                        { 
                            data: 'client_img',
                            render: function(data, type, row) {
                                return `<img src="../assets/uploads/${data}" alt="Client Profile" style="width: 100px; height: auto;">`;
                            }
                         },  // Replace with the actual column data key from your JSON
                        { data: 'client_msg' },
                        { data: 'client_name' },
                        { data: 'client_city' },
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


                // Logout Function
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

                // Create Function
                $('#createForm').on('submit', function(e) {
                    e.preventDefault();  // Prevent the default form submission

                    let formData = new FormData();  // Create a FormData object with the form data
                    
                    let clientImg = $("#client_img")[0].files[0];
                    let clientMsg = $("#client_msg").val();
                    let clientName = $("#client_name").val();
                    let clientCity = $("#client_city").val();
                    

                    formData.append("client_img", clientImg);
                    formData.append("client_msg", clientMsg);
                    formData.append("client_name", clientName);
                    formData.append("client_city", clientCity);
                    
                    $.ajax({
                        url: 'clients-review-create.php',  // Server-side script to handle the upload
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
                                        clientsReviewTable.ajax.reload(null, false);
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
                $('#client_img').on('change', function() {
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
                    let clientId = $(this).data('edit-id'); // Get the car ID from the data-id attribute
                    console.log(clientId);

                    // Send an AJAX request to fetch the car data
                    $.ajax({
                        url: 'clients-review-edit-modal.php',  // Your server-side script to fetch car details
                        type: 'POST',
                        data: { id: clientId },  // Send the car ID to the server
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.status === 'success') {
                                // Populate the modal fields with the fetched data
                                $('#edit_client_id').val(response.data.id); // Set the hidden car ID field
                                $('#edit_client_oldimg').val(response.data.client_img); // Set the hidden old image field
                                $('#edit_client_msg').val(response.data.client_msg); // Set car name
                                $('#edit_client_name').val(response.data.client_name); // Set car name
                                $('#edit_client_city').val(response.data.client_city); // Set car name
                                $('#editImgPreview').attr('src', 'uploads/' + response.data.client_img); // Set image preview
                            } else {
                                console.error('Error fetching data.');
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
                    
                    let clientId = $("#edit_client_id").val();
                    let clientImg = $("#edit_client_img")[0].files[0];
                    let clientOldimg = $("#edit_client_oldimg").val();
                    let clientMsg = $("#edit_client_msg").val();
                    let clientName = $("#edit_client_name").val();
                    let clientCity = $("#edit_client_city").val();
                    
                    formData.append("edit_client_id", clientId);
                    formData.append("edit_client_img", clientImg);
                    formData.append("edit_client_oldimg", clientOldimg);
                    formData.append("edit_client_msg", clientMsg);
                    formData.append("edit_client_name", clientName);
                    formData.append("edit_client_city", clientCity);
                    
                    $.ajax({
                        url: 'clients-review-edit.php',  // Server-side script to handle the upload
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
                                        clientsReviewTable.ajax.reload(null, false);
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
                    let clientId = $(this).data('delete-id');
                    
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
                                url: 'clients-review-delete.php',  // PHP script to handle the deletion
                                type: 'POST',
                                data: { id: clientId },  // Send the car ID
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
                                            clientsReviewTable.ajax.reload(null, false);
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error deleting car:', error);
                                    alert('An error occurred while deleting.');
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
