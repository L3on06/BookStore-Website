<?php    
    include('./classes/CRUD.php');
    $crud = new CRUD;
    
        // Read slider_categories //
         $slider_categories = $crud->read('slider_categories');

        // Read Books //
        $slides = $crud->read('books');
    
        $ShowBestBooks = false;
        $BestBookData = [];
    
        $ShowTrendingBooks = false;
        $TrendingBooksData = [];

        $ShowBestBooksForKids = false;
        $BestBookForKidsData = [];

        $ShowNewReleases = false;
        $NewReleasesData = [];

        $ShowBestProgrammingBooks = false;
        $BestProgrammingBooksData = [];

        $ShowNovel = false;
        $NovelData = [];



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
             else if ($slide['slider_category_id'] === $category['id'] && $category['name'] === 'Best books for Kids') {
              array_push($BestBookForKidsData, $slide);
              $ShowBestBooksForKids = true;
            } else if ($slide['slider_category_id'] === $category['id'] && $category['name'] === 'New Releases') {
              array_push($NewReleasesData, $slide);
              $ShowNewReleases = true;
            } else if ($slide['slider_category_id'] === $category['id'] && $category['name'] === 'Best Programming Books') {
              array_push($BestProgrammingBooksData, $slide);
              $ShowBestProgrammingBooks = true;
            } else if ($slide['slider_category_id'] === $category['id'] && $category['name'] === '	Novel') {
              array_push($NovelData, $slide);
              $ShowNovel = true;
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
          <div class="swiper-wrapper d-flex">
             <!-- Slides -->
             <?php foreach($BestBookData as $slide) {?>
               <div class="swiper-slide">
               <a href="ViewBook.php?id=<?= $slide['id'] ?>">
                <img src="./assets/img/books/<?= $slide['image'] ?>" class="book"  alt="Best books of the year">
              </a>   
                </button>
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
                  <img src="./assets/img/books/<?= $slide['image'] ?>" class="book"  alt="Trending books">
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




<!-- Show best Books for kids -->

<?php if($ShowBestBooksForKids) { ?>
<div class="container">
  <h2 class="text-center p-5 slider-title"><span>Best Books For Kids</span></h2>
    <hr>
      <div class="swiper">
          <div class="swiper-wrapper">
             <!-- Slides -->
             <?php foreach($BestBookForKidsData as $slide) {?>
               <div class="swiper-slide">
                  <img src="./assets/img/books/<?= $slide['image'] ?>" class="book"  alt="Best Books For Kids">
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

<!-- End of Best Books For Kids -->


<!-- New Releases -->

<?php if($ShowNewReleases) { ?>
 <div class="container">
  <h2 class="text-center p-5 slider-title"><span>New Releases</span></h2>
    <hr>
      <div class="swiper">
          <div class="swiper-wrapper">
             <!-- Slides -->
             <?php foreach($NewReleasesData as $slide) {?>
               <div class="swiper-slide">
                  <img src="./assets/img/books/<?= $slide['image'] ?>" class="book"  alt="NewReleases">
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

<!-- End of New Releases -->


<!-- Best Programming Books -->

<?php if($ShowBestProgrammingBooks) { ?>
<div class="container">
  <h2 class="text-center p-5 slider-title"><span>Best Programming Books</span></h2>
    <hr>
      <div class="swiper">
          <div class="swiper-wrapper">
             <!-- Slides -->
             <?php foreach($BestProgrammingBooksData as $slide) {?>
               <div class="swiper-slide">
                  <img src="./assets/img/books/<?= $slide['image'] ?>" class="book"  alt="Best Programming Books">
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

<!-- End of Best Programming Books -->

