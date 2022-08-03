<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>

<?php
include_once "./header.php"
?>

<body>
    <section id="sidebar">
        <header>
            <?php
            include_once "./Php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

            if (mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <div class="image-text">
                <span class="image">
                    <a href=""> <img src="./Images/logo.jpeg" alt=""> </a>
                </span>

                <div class="text logo-text">
                    <span class="name">NODE EIGHT</span>
                    <span class="profession">HR System</span>
                </div>
            </div>
        </header>
        <ul class="side-menu">
            <li> <a href="./index.php"><i class='bx bxs-dashboard icon'></i>
                    Dashboard</a>
            </li>
            <li> <a href="#"><i class='bx bxl-microsoft-teams icon'></i>
                    Teams<i class='bx bx-chevron-right icon-right'></i> </a>

                <ul class="side-dropdown">
                    <li> <a href="#"> <i class='bx bx-laptop icon'></i> Technical</a></li>
                    <li> <a href="#"> <i class='bx bx-movie-play icon'></i>Comm. & Media</a></li>
                    <li> <a href="#"> <i class='bx bx-dollar-circle icon'></i>Finance</a></li>
                    <li> <a href="#"> <i class='bx bxs-briefcase icon'></i>Venture</a></li>
                    <li> <a href="#"> <i class='bx bxs-hard-hat icon'></i>GreenLab</a></li>
                </ul>
            </li>

            <li> <a href="./Todo.php" class="active"><i class='bx bx-notepad icon'></i>
                    Todo List</a>
            </li>
            <li> <a href="./Reminder.php"><i class='bx bxs-bell-ring icon'></i>
                    Reminders</a>
            </li>

            <li> <a href="#"><i class='bx bxs-calendar icon'></i>
                    Calender<i class='bx bx-chevron-right icon-right'></i>
                </a>
                <ul class="side-dropdown">
                    <li> <a href="#"> <i class='bx bx-list-plus icon'></i> Tasks</a></li>
                    <li> <a href="./History.php"> <i class='bx bx-history icon'></i>History</a></li>
                </ul>
            </li>

            <li> <a href="./Report.php"><i class='bx bxs-report icon'></i>
                    Reports </a>
            </li>

            <li> <a href="#"><i class='bx bx-log-out icon '></i>
                    Log Out </a>
            </li>
        </ul>

        <div class="ads">
            <div class="wrapper">
                <a href="#" class="btn-upgrade">Suggestions</a>
                <p>Your Suggestions <span> Are Welcome!</span></p>
            </div>
        </div>
    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search.....">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">8</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bx-message-dots icon'></i>
                <span class="badge">4</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="Php/images/<?php echo $row['img'] ?>" alt="">

                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i>Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i>Settings</a></li>
                    <li><a href="#"><i class='bx bx-log-out'></i>Logout</a></li>
                </ul>
            </div>
        </nav>

        <main>
            <h1 class="title">ToDo List</h1>
            <ul class="breadcrumbs">
                <li> <a href="#">ToDo List</a></li>
                <li class="divider">/</li>
                <li> <a href="./index.php" class="active">Home</a>
                </li>
            </ul>

            <!-- Note section -->
            <div class="popup-box">
                <div class="popup">
                    <div class="content">
                        <header>
                            <p>Add a New Task</p>
                            <i class='bx bx-x'></i>
                        </header>
                        <form action="#">
                            <div class="row title">
                                <label>Title</label>
                                <input type="text">
                            </div>
                            <div class="row desciption">
                                <label>Content</label>
                                <textarea></textarea>
                            </div>
                            <button>Add Task</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="wrap">
                <li class="add-box">
                    <div class="icons"><i class='bx bx-plus'></i></div>
                    <p>Add New Task</p>
                </li>
            </div>

        </main>
    </section>

    <script src="./Javascript/index.js"></script>
</body>

</html>