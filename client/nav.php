
<nav class="bg-white shadow-md">
<div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">TodoApp</h1>
    <div>
        <?php
             if(!isset($_SESSION["user"])) { 

                echo '
                    <a href="/todo_app/index.php?signup=true" class="text-blue-500 mx-2">Sign up</a>
                    <a href="/todo_app/index.php?login=true" class="text-blue-500 mx-2">Login</a>
                ';
            } else {

                echo '
                    <form action="./server/request.php" method="GET" style="display:inline;"> <!-- Inline form -->
                        <button name="logout" type="submit" class="text-blue-500">Logout</button>
                    </form>
                ';
            }
        ?>
    </div>
</div>
</nav>
