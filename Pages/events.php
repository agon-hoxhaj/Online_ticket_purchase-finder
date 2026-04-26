<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../Style/eventss.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<title>Page Title</title>

</head>
<body>

<?php
session_start();
include_once __DIR__ . '/../Components/nav.php';
require '../Classes/Event_Class.php';
require '../Classes/Ticket_Class.php';
require '../Components/Event_Components/seet_formation.php';
require '../Components/Event_Components/event_card.php';
require '../Components/Event_Components/event_details.php';
$user_tickets = [];
?>


<div class="d-flex flex-row justify-content-between">
    <div class="d-flex flex-column" style="width: 50%;background-color: rgb(22, 22, 22);padding-top: 20px;">
        <div c style="width: 100%;padding: 20px;padding-top: 20px;"> 

            <div class="container my-3">
                <div class="form-inline my-2 my-lg-0">
                    <input id="searchInput" class="d-flex flex-grow-1 form-control mr-sm-2 bg-dark text-white border-secondary" type="search" placeholder="Search by event name, type, or location..." aria-label="Search">
                    
                    <select id="typeFilter" class="d-flex ml-2 mr-2 bg-dark form-control text-white border-secondary">
                        <option value="all">All Types</option>
                        <option value="koncert">Concert</option>
                        <option value="teater">Theater</option>
                        <option value="festival">Festival</option>
                        <option value="stand up">Stand Up</option>
                    </select>

                    <select id="timeFilter" class="d-flex ml-2 mr-2 bg-dark form-control text-white border-secondary">
                        <option value="all">Any Time</option>
                        <option value="month">This Month</option>
                        <option value="year">This Year</option>
                    </select>
                    <button id="searchButton" class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
                </div>
            </div>

            <div id="itemsContainer">
                <?php foreach($event_array as $index => $Event){renderEventItem($Event,$base_path);}?>
            </div>

        </div>
    </div>

    <div class="d-flex flex-column" style="width: 50%;background-color: rgb(22, 22, 22) ;padding-top: 40px;">
        <?php renderEventDetails($event_array, $chairs);?>
    </div>
</div>

<script src="../Script/eventss.js"></script>



<?php include_once __DIR__ . '/../Components/footer.php'; ?>

</body>
</html>

