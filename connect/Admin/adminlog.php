<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="../img/gshares.png">
    <title>Admin | Login</title>
</head>
<body class="body1">

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  
    <div class="mt-28 sm:mx-auto sm:w-full sm:max-w-sm border border-blue-400 ring-2 ring-green-500 rounded-lg">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
        <!-- <img class="mx-auto h-40 w-auto transform hover:scale-110 duration-150" src="/img/GMAN.png" alt="Your Company"> -->
        <h1 class=" mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-white">G SHARE</h1>
        <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-white">Welcome Admin </h2>
      </div>
      
      <form class="space-y-6 m-5"  action="adminAuth.php" method="post" >
        <div>
          <label for="name" class="block text-sm font-medium leading-6 text-white">Username</label>
          <div class="mt-2">
            <input id="l_uname" name="adminl_uname" type="text" autocomplete="name" required class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" name="adminl_pass" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-lg ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2  focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
        </div>
      </form>
     
    </div>
  </div>
</body>

</html>