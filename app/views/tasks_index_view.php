<ul>
    <?php foreach ($this->tasks as $task): ?>
    <li><?= $task['name'] ?></li><form method="POST" action="/tasks/delete"> <input type="hidden" value="<?= $task['id']?>" name="task_id"/><input type="submit" value="delete"/><input type="submit" value="update" formaction="/tasks/updateF"/></form>
    <?php endforeach;?>
    <a href="/tasks/create">Добавить задачу</a>
</ul>
