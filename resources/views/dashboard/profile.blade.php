<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Home</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
        .btn{
            
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 14px 122px;
            text-decoration: none;
            margin: 16px 2px;
            cursor: pointer;
            
        }
         #description-button{
             
             margin-left: 55px;
             
         }
        table {
            border-collapse: collapse;
            width:97%;
            margin:2px;
            margin-left:6px;
        }
        th, td {
            text-align: left;
            padding:15.5px;
            
        }
        tr:nth-child(even){background-color: #f2f2f2}
        th {
            background-color: #4CAF50;
            color: white;
        }
        #main { 
            width: 498px ;
            height:auto;
            margin: 0 auto;
            border-style:none;
            
        }
        #sidebar    {
            width: 200px;
            height: auto;
            border-right-style:none;
            border-bottom-style:none;
            float: center;
            
            
        }
        #page-wrap  {
            width: 300px;
            height: 200px;
            margin-left: 200px;
            border-bottom-style:solid;
            border-color:green;
            
        }
        body {
            font-family: "Lato", sans-serif;
        }
        .h2collor{
         color: white;
         font-size: 16px;
         text-align: center;
        }
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }
        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            font-size: 16px;    
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .search{
            
            position: absolute;
           margin-left:850px;
           margin-top:12px;
           padding-left:200px;
        }
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .sidenav {
            height: 100%;
            width: 160px;
            position: absolute;
            z-index: 1;
            top: 60;
            left: 10;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .main {
            margin-left: 160px; /* Same as the width of the sidenav */
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 0px 10px;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
 </style>
 </head>
 <body>
 
 
   <div class="navbar">
  <a href="{{route('admin-dash')}}">Home</a>
  <a href="{{route('show-profile')}}">Profile</a>
  <a href="{{route('show-message')}}">Message</a>
  <a href="{{route('show-friendlist')}}">Friend List</a>
</div>
<div class="sidenav">
   <h2 class="h2collor">Settings</h2>
  <a href="nikunja.php">Reset password</a>
  <a href="{{route('logout')}}">Logout</a>
</div>
   <br>
   <div class="all">

            
        <div id='main'>
                <div id='sidebar'>
            <img src="{{url('upload/'.$user->images)}}" height="198" width="200"/>
                </div>
            
                    
             <table>
               <tr><th>Name:</th><td>{{$user -> name}}</td></tr>
               <tr><th>email:</th><td>{{$user -> email}}</td></tr>
               <tr><th>Password:</th><td>{{$user -> password}}</td></tr>
             </table>
          <br>
          <form method="post" action="{{route('user-post')}}">
             {{ @csrf_field() }}
              <h1>Give your Post here</h1>
              <h3>Post name:</h3><input type="text" name="postname">
              <h3>Your post</h3>
              <textarea name="post" rows="5" cols="50"></textarea>
              <br>
              <br>
              <input type="submit" name="Post" value="post">

          </form>     
        </div>
    </div>
        
        
 
  
 </body>
</html>
