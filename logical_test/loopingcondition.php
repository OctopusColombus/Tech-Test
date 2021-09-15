<?php
for ($i=1; $i <= 50; $i++)
{
    if ($i % 15 == 0)
        echo("FooBar <br>");
    else if ($i % 3 == 0)
        echo("Foo <br>");
    else if ($i % 5 == 0)
        echo("Bar <br>");
}