<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        How to design Responsive card-deck
        with fixed width in Bootstrap ?
    </title>

    <!-- bootstrap linked-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <!-- Card design with bootstrap class mx-auto 
		for making it centered in the div-->
    <div class="card mx-auto mt-5" style="width:18rem;">
        <img class="card-img-top" src="https://media.geeksforgeeks.org/wp-content/uploads/20200529212604/geeks.png"
            alt="Card image cap">

        <div class="card-body">
            <h5 class="card-title">
                GeeksforGeeks
            </h5>

            <p class="card-text">
                Geeks for Geeks is the best place
                to improve your computer science
                knowledge.
            </p>


            <a href="#" class="btn btn-success">
                Click me
            </a>
        </div>
    </div>

    <!--card end here-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>