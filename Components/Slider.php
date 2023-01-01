<?php    
    include('./classes/CRUD.php');
    $crud = new CRUD;
    
    // Read slider_categories //
    $slider_categories = $crud->read('slider_categories');

        $ShowBestBooks = false;
        $BestBookData = [];

    // Read Books //
    $slides = $crud->read('books');
    
        $ShowTrendingBooks = false;
        $TrendingBooksData = [];


    // Read all Databases // 
    if(count($slides)) {
        foreach($slides as $slide) {
        if($slide['slider_category_id'] !== null && is_array($slider_categories)){
            foreach($slider_categories as $category){
            if($slide['slider_category_id'] === $category['id'] && $category['name'] === 'Trending books' ){
                array_push($TrendingBooksData, $slide);
                $ShowTrendingBooks = true;
            } else if ($slide['slider_category_id'] === $category['id'] && $category['name'] === 'Best books of the year') {
              array_push($BestBookData, $slide);
              $ShowBestBooks = true;
            }
          }
        }
      }
    }

    // Delete action //
    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('books', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete slide with #'+$_GET['id'];
            }
        }
    }
?>


<!-- Best Books -->

<?php if($ShowBestBooks) { ?>
<div class="container">
  <h2 class="text-center p-5 slider-title"><span>Best books of the year</span></h2>
    <hr>
      <div class="swiper">
          <div class="swiper-wrapper">
             <!-- Slides -->
             <?php foreach($BestBookData as $slide) {?>
               <div class="swiper-slide">
                  <img src="./assets/img/sliders/<?= $slide['image'] ?>" class="book"  alt="Best books of the year">
               </div>  
            <?php }?>
            <!-- end of sliders -->                   
          </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
      </div>
      <hr>
    </div>
</div>
<?php }?>

<!-- End of Best Books -->


<!-- Trending -->


<?php if($ShowTrendingBooks) { ?>
 <div class="container">
  <h2 class="text-center p-5 slider-title"><span>Trending Books</span></h2>
    <hr>
      <div class="swiper">
          <div class="swiper-wrapper">
             <!-- Slides -->
             <?php foreach($TrendingBooksData as $slide) {?>
               <div class="swiper-slide">
                  <img src="./assets/img/sliders/<?= $slide['image'] ?>" class="book"  alt="Trending books">
               </div>  
            <?php }?>
            <!-- end of sliders -->                   
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>
    <hr>
  </div>
</div>
<?php }?>


<!-- End of Trending -->
