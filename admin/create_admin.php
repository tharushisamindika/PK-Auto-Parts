<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 500px;
        margin: 100px auto;
        padding: 20px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #990a0a;
    }

    .admin-form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus {
        border-color: #5cb85c;
        outline: none;
    }

    .submit-btn {
        padding: 10px;
        background-color: #990a0a;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background-color: #cc0d0d;
        color: black;
    }

    .btn-secondary {
        margin-top: 10px;
        width: 100%;
    }
</style>
<body>
    <div class="container">
        <h1>Create New Admin</h1>
        <form action="create_admin_handler.php" method="POST" class="admin-form">
            <label for="username">New Admin Username:</label>
            <input type="text" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            
            <button type="submit" class="submit-btn">Create Admin</button>
        </form>
        <a href="manage_products.php" class="btn btn-secondary mb-3">&larr; Back</a>
    </div>

    <!-- Success/Error Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="statusMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Check the URL for success or error status
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        
        if (status) {
            const modalTitle = document.getElementById('statusModalLabel');
            const modalMessage = document.getElementById('statusMessage');
            if (status === 'success') {
                modalTitle.innerText = 'Success';
                modalMessage.innerText = 'New admin created successfully!';
                modalTitle.classList.add('text-success');
            } else if (status === 'error') {
                modalTitle.innerText = 'Error';
                modalMessage.innerText = 'There was an error creating the new admin.';
                modalTitle.classList.add('text-danger');
            }
            $('#statusModal').modal('show');
        }
    </script>
</body>
</html>
