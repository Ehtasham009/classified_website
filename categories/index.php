<?php 
include '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASEURL ?>/css/global.css" />
    
</head>
<body><div class="category-sidebar">
  <ul class="category-menu">
    <li>
      <span class="toggle">Mobile Phones</span>
      <ul>
        <li>
          <span class="toggle">Android Phones</span>
          <ul>
            <li>
              <span class="toggle">Samsung</span>
              <ul>
                <li>
                  <span class="toggle">Galaxy S Series</span>
                  <ul>
                    <li><a href="#">Galaxy S24 Ultra</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <span class="toggle">Xiaomi</span>
              <ul>
                <li>
                  <span class="toggle">Redmi Note Series</span>
                  <ul>
                    <li><a href="#">Redmi Note 13 Pro</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <span class="toggle">iPhones</span>
          <ul>
            <li>
              <span class="toggle">iPhone 14 Series</span>
              <ul>
                <li>
                  <span class="toggle">iPhone 14 Pro</span>
                  <ul>
                    <li><a href="#">iPhone 14 Pro Max 512GB</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</div>

    <script src="<?php echo BASEURL ?>/js/categories.js"></script>
</body>
</html>