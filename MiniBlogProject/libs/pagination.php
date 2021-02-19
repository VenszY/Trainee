<?PHP
$NUMPERPAGE = 5; // max. number of items to display per page
$this_page =  "?controller=Blog&action=HomePage";
$data = new BlogController();
$getResult = $data->filterDate();
//$data = range(1, 150); // data array to be paginated
$num_results = count($getResult);

//print_r($getResult);
//print_r($_POST['dateFrom']);
//print_r($_POST['dateTo']);
//var_dump($num_results);




  # Original PHP code by Chirp Internet: www.chirp.com.au
  # Please acknowledge use of this code by including this header.

  if(!isset($_GET['page']) || !$page = intval($_GET['page'])) {
      $page = 1;
  }

  // extra variables to append to navigation links (optional)

$linkextra = [];

  if(!empty($_GET['dateTo']) || !empty($_GET['dateFrom'])) {
      if(isset($_GET['dateFrom']) ) {
          $dateFrom = $_GET['dateFrom']; // repeat as needed for each extra variable
          $linkextra[] = "dateFrom=" . urlencode($dateFrom);
      }
      if(isset($_GET['dateTo']) ) {
          $dateTo = $_GET['dateTo']; // repeat as needed for each extra variable
          $linkextra[] = "dateTo=" . urlencode($dateTo);
      }
  }

$linkextra = implode("&amp;", $linkextra);
if($linkextra) {
    $linkextra .= "&amp;";
}



  // build array containing links to all pages
  $tmp = [];
  for($p=1, $i=0; $i < $num_results; $p++, $i += $NUMPERPAGE) {
      if($page == $p) {
          // current page shown as bold, no link
          $tmp[] = "<b>{$p}</b>";
      } else {
          $tmp[] = "<a href=\"{$this_page}&{$linkextra}page={$p}\">{$p}</a>";
      }
  }

// thin out the links (optional)
  for($i = count($tmp) - 3; $i > 1; $i--) {
      if(abs($page - $i - 1) > 2) {
          unset($tmp[$i]);
      }
  }

  // display page navigation iff data covers more than one page
  if(count($tmp) > 1) {
      echo "<p>";

      if($page > 1) {
          // display 'Prev' link
          echo "<a href=\"{$this_page}&{$linkextra}page=" . ($page - 1) . "\">&laquo; Prev</a> | ";
      } else {
          echo "Page ";
      }

      $lastlink = 0;
      foreach($tmp as $i => $link) {
          if($i > $lastlink + 1) {
              echo " ... "; // where one or more links have been omitted
          } elseif($i) {
              echo " | ";
          }
          echo $link;
          $lastlink = $i;
      }

      if($page <= $lastlink) {
          // display 'Next' link
          echo " | <a href=\"{$this_page}&{$linkextra}page=" . ($page + 1) . "\">Next &raquo;</a>";
      }

      echo "</p>\n\n";
  }
?>
<?php
$getResult = new \ArrayIterator($getResult);
$it = new \LimitIterator($getResult, ($page - 1) * $NUMPERPAGE, $NUMPERPAGE);
$dotsCounter = 0;
$moreCounter = 0;
$btnCounter = 0;
$funcCounter = 0;

foreach($it as $blogs) {
    ?>
    <tr>
        <td><?php echo $blogs['title']; ?></td>
        <td>
            <?php

            if(strlen($blogs['content']) > 15) {
                echo substr($blogs['content'], 0, 15); ?><span id='dots<?php $dotsCounter++; echo $dotsCounter; ?>'>...</span><span id='more<?php $moreCounter++; echo $moreCounter; ?>' class="more"><?php echo substr($blogs['content'], 15); ?></span>
                <button onclick='moreLess<?php $funcCounter++; echo $funcCounter; ?>()' id='btn<?php $btnCounter++; echo $btnCounter; ?>' >Read more</button>
                <?php
            } else {
                echo $blogs['content'];
            }
            ?>
        </td>
        <td><?php echo $blogs['date']; ?></td>
        <td><?php echo $blogs['copyright']; ?></td>
        <td>
            <a href="?controller=Blog&action=UpdateBlog&id=<?php echo $blogs['id']; ?>">Update Blog</a>
        </td>
    </tr>
<?php } ?>
