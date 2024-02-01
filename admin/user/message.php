<?php


class One 
{
    public static function main()
    {
        return '
        <div class="main>
        <h1>Main</h1>
        </div>
        ';
    }
}
echo json_encode(One::main());