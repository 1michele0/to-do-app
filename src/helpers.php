<?php


use Michele00\ToDoApp\Memory\FactoryMemory;

function is_empty(): bool
{
    return FactoryMemory::getMemory()->is_empty();
}

function get_list(): array
{
    return FactoryMemory::getMemory()->get_list();
}
