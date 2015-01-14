<?php
//Database=membership;Data Source=us-cdbr-azure-west-a.cloudapp.net;User Id=b20f46da60e22d;Password=ee06f1cb
//server=localhost;user=root;pwd=y4h00.c0m!@!;database=TaskMeNow
    function connect(){
        $host = "us-cdbr-azure-west-a.cloudapp.net";
        $user = "b20f46da60e22d";
        $pwd = "ee06f1cb";
        $db = "membership";

        try{
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
            die(print_r($e));
        }
        return $conn;
    }

    function markItemComplete($item_id)
    {
	    $conn = connect();
	    $sql = "UPDATE items SET is_complete = 1 WHERE id = ?";
	    $stmt = $conn->prepare($sql);
	    $stmt->bindValue(1, $item_id);
	    $stmt->execute();
    }


        function getAllShows(){
        $conn = connect();
        $sql = "SELECT * FROM shows";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_NUM);

    }

       function getAllEpisodes(){
        $conn = connect();
        $sql = "SELECT * FROM episodes";
        $stmt = $conn->query($sql);

        $myfile = fopen(dirname(__FILE__) . '/../json/events.json', "w");
        $result = $stmt->fetchAll();


        while($row = mysqli_fetch_assoc($stmt)) {
            $encode[] = $row;
        }
        fwrite($myfile, json_encode($result));
        fclose($myfile);


        return $stmt->fetchAll(PDO::FETCH_NUM);
        //return $stmt;
    }

       function getEpisodesByWeek(){
        $conn = connect();
        $sql = "SELECT * FROM episodes WHERE YEARWEEK(airdate) = YEARWEEK(now())";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_NUM);
        

    }

 /*      function getEpisodes($show){
        $conn = connect();
        $sql = "SELECT showId FROM shows WHERE name=?";
        $sql->bindValue(1, $show);
        $stmt = $conn->query($sql);
        $sql = "SELECT * FROM episodes WHERE showId=?";
        $sql->bindValue(1, $stmt);
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_NUM);

    }*/

    function addItem($name, $category, $date, $is_complete){
        $conn = connect();
        $sql = "INSERT INTO items (name, category, date, is_complete) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $category);
        $stmt->bindValue(3, $date);
        $stmt->bindValue(4, $is_complete);
        $stmt->execute();
    }

    function addShow($show){
        $conn = connect();

        //normalize text
        $show = str_replace(" ", "", $show);
        $show = strtolower($show);

        //get showID
        $showFeed = urldecode("http://services.tvrage.com/feeds/search.php?show=".$show);
        $showstring = file_get_contents($showFeed);
        //var_dump($showstring=='0'); die;
        $showxml = simplexml_load_string($showstring);
        if(!$showxml->count()){
            echo $show ." does not exist in TVRage";
            die;
        }
        //write show info to shows table
        $showID = $showxml->show->showid;
            $sql = "SELECT showId FROM shows WHERE showId=".$showID;
            $result = $conn->query($sql);
            if($result->rowCount() > 0){
                echo "entry already exists";
                die;
            }
        $name = $showxml->show->name;
        $link = $showxml->show->link;
        $country = $showxml->show->country;
        $started = $showxml->show->started;
        $ended = $showxml->show->ended;
        $seasons = $showxml->show->seasons;
        $status = $showxml->show->status;
        $classification = $showxml->show->classification;
        $showxml->show->classification;
        $genre = $showxml->show->genres->genre;
        /*foreach($showxml->show->genres as $eachgenre){
            $genre .= $eachgenre . " ";
            echo "in loop";
        }*/

        $sql = "INSERT INTO shows (showid, name, link, country, started, ended, seasons, status, classification, genres) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $showID);
        $stmt->bindValue(2, $name);
        $stmt->bindValue(3, $link);
        $stmt->bindValue(4, $country);
        $stmt->bindValue(5, $started);
        $stmt->bindValue(6, $ended);
        $stmt->bindValue(7, $seasons);
        $stmt->bindValue(8, $status);
        $stmt->bindValue(9, $classification);
        $stmt->bindValue(10, $genre);
        $stmt->execute();

        //write episodes to table
        $showID = $showxml->show->showid;

        $episodeFeed = "http://services.tvrage.com/feeds/episode_list.php?sid=".$showID;
        $episodeString = file_get_contents($episodeFeed);
        $episodeXml = simplexml_load_string($episodeString);


        $totalseasons = $episodeXml->totalseasons;
        //write each episode (by season) to episodes table
        foreach($episodeXml->Episodelist->Season as $seasons){
            foreach($seasons->episode as $episodes){
                $epnum = $episodes->epnum;
                $seasonnum = $episodes->seasonnum;
                $prodnum = 0; //not sure what this is and don't want to check if it's !NULL for every episode
                $airdate = $episodes->airdate;
                $eplink = $episodes->link;
                $title = $episodes->title;

                $sql = "INSERT INTO episodes (showid, name, totalseasons, epnum, seasonnum, prodnum, start, link, title) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, $showID);
                $stmt->bindValue(2, $name);
                $stmt->bindValue(3, $totalseasons);
                $stmt->bindValue(4, $epnum);
                $stmt->bindValue(5, $seasonnum);
                $stmt->bindValue(6, $prodnum);
                $stmt->bindValue(7, $airdate);
                $stmt->bindValue(8, $eplink);
                $stmt->bindValue(9, $title);
                $stmt->execute();
                
            }
        }
        

    
         
  
    }

    function deleteItem($item_id){
        $conn = connect();
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $item_id);
        $stmt->execute();
    }
   