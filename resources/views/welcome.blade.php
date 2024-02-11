<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Kalam" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Kalam';
      font-size: 22px;
      color: #c88547;

    }
    .sidebar {
      background-image: url('https://images.unsplash.com/photo-1567696911980-2eed69a46042?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-form {
      padding: 20px;
      padding-top: 5%;
    }
    h3{
        padding-bottom: 5%;
    }
    button.btn.btn-primary.w-100 {
    background: #c88547;
    border: 0;
    }
    #errors{
        color:red;
        font-size: 18px;
        margin-bottom: 5px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 sidebar">
      </div>
      <div class="col-md-6">
        <div class="login-form">
          <h3 class="text-center mb-4">BrewMaster</h3>
          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value='root@email.it' required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" value='!A123rt_wQa_' required>
            </div>
            @error('errors')
                <div id="errors">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
