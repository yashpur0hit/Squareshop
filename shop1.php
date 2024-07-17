<?php session_start();?>
<?php
include "header.php";
include "con1.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page1</title>
    <!-- Include any CSS or stylesheets here -->
</head>

<body>

    <!-- Include header and any other necessary PHP files -->
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Product Variety</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="shop1.php">Pick Your Choice</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Budget Range</div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 6</option>
                        </select>
                    </div>
                </div>
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">

                        <?php
                        // Pagination logic
                        $limit = 6; // Number of products per page
                        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number from URL
                        $offset = ($page - 1) * $limit; // Offset for SQL query
                        
                        $query = "SELECT * FROM `product` LIMIT $limit OFFSET $offset";
                        $result = $con1->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-lg-4 col-md-6">';
                                echo '<div class="single-product">';
                                echo '<img class="img-fluid" src="' . $row['Pimg'] . '" alt="' . $row['Pname'] . '">';
                                echo '<div class="product-details">';
                                echo '<h6>' . $row['Pname'] . '</h6>';
                                echo '<h7>' . $row['Decp'] . '</h7>';
                                echo '<div class="price">';
                                echo '<h6>₹' . $row['Price'] . '</h6>';
                                echo '</div>';
                                //********************CART********************
                                echo '<div class="prd-bottom">';
                                echo '<a href="cart.php?p=' . $row['PID'] . '" class="social-info">';
                                echo '<span class="ti-bag"></span>';
                                echo '<p class="hover-text">add to bag</p>';
                                echo '</a>';

                                // echo '<a href="#" class="social-info">';
                                // echo '<span class="lnr lnr-heart"></span>';
                                // echo '<p class="hover-text">Wishlist</p>';
                                // echo '</a>';
                                
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-lg-12">';
                            echo '<p>No products found.</p>';
                            echo '</div>';
                        }
                        ?>

                    </div>
                </section>
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    // Count total number of products
                    $total_query = "SELECT COUNT(*) as total FROM `product`";
                    $total_result = $con1->query($total_query);
                    $total_row = $total_result->fetch_assoc();
                    $total_products = $total_row['total'];

                    // Calculate total pages
                    $total_pages = ceil($total_products / $limit);

                    // Render pagination links
                    if ($total_pages > 1) {
                        if ($page > 1) {
                            echo '<a href="shop1.php?page=' . ($page - 1) . '" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
                        }
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                echo '<a href="shop1.php?page=' . $i . '" class="active">' . $i . '</a>';
                            } else {
                                echo '<a href="shop1.php?page=' . $i . '">' . $i . '</a>';
                            }
                        }
                        if ($page < $total_pages) {
                            echo '<a href="shop1.php?page=' . ($page + 1) . '" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
                        }
                    }
                    ?>
                </div>
                <!-- End Pagination -->
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap">
        <div class="container">
            <!-- Related products or deals section can be added here -->
        </div>
    </section>
    <!-- End related-product Area -->

    <!-- Include footer -->
    <?php include "Footer.php"; ?>

</body>

</html>

<?php
// Close the database connection at the end of the file
mysqli_close($con1);
?>