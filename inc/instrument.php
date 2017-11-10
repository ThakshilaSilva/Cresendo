<?php

class instrument
{

}


function get_instrument($connection)
{
    mysqli_set_charset($connection, 'utf8');
    $instrument_query = mysqli_query($connection, "SELECT Title from instrument");

    if (!$instrument_query) {
        die("database query failed." . mysqli_error($connection));
    }


    $instruments = [];
    while ($instrument = $instrument_query->fetch_array()) {
        $instruments[] = $instrument["Title"];

    }
    return array_slice($instruments, 0);


}




