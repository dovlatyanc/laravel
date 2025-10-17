<?php

namespace App;

class Task
{
    private static  $tasks = [];
    public function __construct(
        public int $id,
        public string $due,
        public string $title
    ) {}

    

    public static function staticConstruct():void{
        self::$tasks =
        [
                new Task(1, '2025-10-13', 'Пары'),
                new Task(2, '2015-10-12', 'Test'),
                new Task(3, '2024-11-11', 'test2'),
        ];
    }

    public static function getAll():array{
        return self::$tasks;

    }

    public static function findById(int $id){
        foreach(self::$tasks as $task)
            if($task->id==$id)
                return $task;
            throw new \Exception ("Не найдена задача с id ={$id}");
    }

      public static function create(string $title, string $due): void
    {
        // Найдём максимальный ID, чтобы назначить новый
        $maxId = 0;
        foreach (self::$tasks as $task) {
            if ($task->id > $maxId) {
                $maxId = $task->id;
            }
        }
        $newId = $maxId++;
        self::$tasks[] = new Task($newId, $due, $title);
    }

    //  обновить задачу
    public static function update(int $id, string $title, string $due): void
    {
        foreach (self::$tasks as $key => $task) {
            if ($task->id === $id) {
                self::$tasks[$key]->title = $title;
                self::$tasks[$key]->due = $due;
                return;
            }
        }
        throw new \Exception("Не найдена задача для обновления с id = {$id}");
    }
}
Task::staticConstruct();