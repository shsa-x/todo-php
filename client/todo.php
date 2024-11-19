        <form method="POST" action="./server/request.php" class="mb-4 mx-36 mt-20 flex ">
            <input type="text" name="title" placeholder="Add a new todo" class="border rounded px-2 py-1 w-full bg-slate-200 border-2 border-slate-300 " required />
            <button name="addTodo" type="submit" class="bg-blue-500 text-white rounded px-4 py-1 ml-2">Add Todo</button>
        </form>

        <?php 

            include("./db/db.php");

            $todos = [];

            $id = $_SESSION['user']['id'];
            $query = "select * from todo where userId='$id'";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $todos[] = $row;
            }

        ?>

        <div class="todo-list mx-40 mt-10">
            <?php foreach ($todos as $todo): ?>
                <div class="todo-item flex items-center mb-4 p-4 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <form method="POST" action="./server/request.php" class="flex items-center w-full">
                        <input 
                            type="checkbox" 
                            name="complete" 
                            value="<?= $todo['todoId']; ?>"
                            onchange="this.form.submit()" 
                            class="mr-4 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        />
                        <h1>
                            <?= htmlspecialchars($todo['title']); ?>
                        </h1>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>