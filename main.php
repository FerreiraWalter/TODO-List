<?php

$todos = [];

if(file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<html lang=”pt-br”>
<head>
    <meta charset=”UTF-8”>
    <title>TODO-List</title>
   <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-purple-500">
    <form class="pt-10" action="newtodo.php" method="post">
        <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
            <div class="shadow-2xl bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                <div class="mb-4">
                    <h1 class="font-semibold text-2xl flex justify-center">TODO LIST</h1>

                    <div class="flex mt-4">
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                               name="todo_name" placeholder="Add Todo">
                        <button class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white
                        hover:bg-teal-600">Add</button>
                    </div>
                </div>
    </form>

        <div>
            <?php foreach ($todos as $todoName => $todoSituation): ?>
                <div class="flex justify-center mb-0.5">

                    <form class="pt-6 pr-2" action="changeStatus.php" method="post">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                        <input type="checkbox" class="flex justify-start h-4 w-4" <?php echo
                        $todoSituation['completed'] ? 'checked' : '' ?>>
                    </form>

                    <p class="flex justify-center font-mono pt-5 pr-1"><?php echo $todoName ?></p>

                    <form  action="delete.php" method="post">
                        <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                        <button class=" flex-no-shrink p-2 ml-1 border-2 mt-3 rounded text-red-400 border-red-400
                        hover:text-white hover:bg-red-400">Remove</button>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>

            </div>
        </div>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit();
            };
        })
    </script>


</body>
</html>
