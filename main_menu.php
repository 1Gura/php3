<?php
$mainMenu = [
    [
        'title' => 'Главная',
        'path' => '/',
        'sort' => 5
    ],
    [
        'title' => 'О нас',
        'path' => '../route/about.php',
        'sort' => 2,
    ],
    [
        'title' => 'Контакты',
        'path' => '../route/contacts.php',
        'sort' => 4,
    ],
    [
        'title' => 'Новости',
        'path' => '../route/news.php',
        'sort' => 3,
    ],
    [
        'title' => 'Каталог',
        'path' => '../route/catalog.php',
        'sort' => 1,
    ],
];

function arraySort(&$menu, $key = 'sort', $sort = SORT_ASC)
{
    usort($menu, mySort($key, $sort));
}

function mySort($key, $sort): Closure
{
    if ($sort === SORT_ASC) {
        return function ($a, $b) use ($key) {
            return $a[$key] <=> $b[$key];
        };
    } else if ($sort === SORT_DESC) {
        return function ($a, $b) use ($key) {
            if ($a === $b) return 0;
            return $a < $b ? 1 : -1;
        };
    }

}

function renderMenu($menu, $position = 'header'): string
{
    $style = $position === 'footer' ? 'bottom' : '';
    $fz = $position === 'footer'? 'fz12' : 'fz16';
    return "
        <ul class='main-menu $style $fz'>
            <li class='selected'><a href = '{$menu[0]['path']}'>{$menu[0]['title']}</a></li>
            <li class='selected'><a href = '{$menu[1]['path']}'>{$menu[1]['title']}</a></li>
            <li class='selected'><a href = '{$menu[2]['path']}'>{$menu[2]['title']}</a></li>
            <li class='selected'><a href = '{$menu[3]['path']}'>{$menu[3]['title']}</a></li>
            <li class='selected'><a href = '{$menu[4]['path']}'>{$menu[4]['title']}</a></li>
        </ul>
        ";
}

function showMenu($position, &$menu): string
{
    if ($position === 'header') {
        arraySort($menu);
        return renderMenu($menu);
    } else if ('footer') {
        arraySort($menu, 'title', SORT_DESC);
        return renderMenu($menu, $position);
    }
}