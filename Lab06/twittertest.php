<?php
    require "twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    $name = $_REQUEST["name"];
    $conskey="dgCHShiDqLIvhksyVtFmUKwJz";
    $conssec="u6YLN2L8fRlvluAfQWW7OOKeJv3QSlxHihjatOkjYwvInwiRXD";
    $acctok="578176008-AVadeZ78brCTcpBFrlGAJ8tPuzqm94TLBGPgDGw6";
    $acctoksec="2mlTQc4pyHXzSyhRENCTzTs7jLAd5RdOOgZKpxLhvx5NZ";
    $connection = new TwitterOAuth($conskey, $conssec, $acctok, $acctoksec);
    $content = $connection->get("account/verify_credentials");
    //var_dump($content);

    $statuses = $connection->get("statuses/user_timeline", ["q" => "twitterapi", "screen_name" => $name.""]);
    print_r($statuses);
?>
