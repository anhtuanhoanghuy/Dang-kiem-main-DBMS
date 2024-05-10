<?php
require_once "./vendor/autoload.php";
    class HomeModel {
        public function getLatestNews() {
            $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $latestNews = $quanlydangkiemdb->latest_news;
            $document = $latestNews->find(array());
            $data = iterator_to_array($document);
            return $data;
        }
        public function getGeneralNews() {
           $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $generalNews = $quanlydangkiemdb->general_news;
            $document = $generalNews->find(array());
            $data = iterator_to_array($document);
            return $data;
        }
        public function getWaterwaysNews() {
           $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $waterwaysNews = $quanlydangkiemdb->waterways_news;
            $document = $waterwaysNews->find(array());
            $data = iterator_to_array($document);
            return $data;
        }
        public function getRoadNews() {
           $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $roadNews = $quanlydangkiemdb->road_news;
            $document = $roadNews->find(array());
            $data = iterator_to_array($document);
            return $data;
        }
        public function getGlobalNews() {
           $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $globalNews = $quanlydangkiemdb->global_news;
            $document = $globalNews->find(array());
            $data = iterator_to_array($document);
            return $data;
        }
        public function getNotification() {
           $client = new MongoDB\Client("mongodb://localhost:27017");
            $quanlydangkiemdb = $client->quanlydangkiem;
            $notification = $quanlydangkiemdb->notification;
            $document = $notification->find(array());
            $data = iterator_to_array($document);
            return $data;
        }

    }


?>