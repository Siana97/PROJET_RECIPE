<?php 

function truncate($text, $limit) {
    // Divisez la description en mots
    $words = explode(' ', $text);

    // Sélectionnez les premiers $limit mots
    $shortenedText = implode(' ', array_slice($words, 0, $limit));

    // Ajoutez "..." à la fin si la description a été tronquée
    if (count($words) > $limit) {
        $shortenedText .= '...';
    }

    return $shortenedText;
}

