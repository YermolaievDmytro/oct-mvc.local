<ul>
    <?php foreach ($this->tasks as $task): ?>
    <li><?= $task['name'] ?></li>
    <?php endforeach; ?>
    <a href="/tasks/create">Добавить задачу</a>
</ul>
