<?php  
includes :: get_includes('modules/header/basic.php');

$module = select_one('modules', "default_module = 1", 0, __FILE__,__LINE__);
?>

<!--
<header class="header">
	<div class="container">
		<div class="header__row">
			<div class="header__logo"><a href="<?= '/'.LANG.'/'.$module['alias_'.LANG]?>"><img src="/images/png/Logo.png" alt=""></a></div>
			<div class="header__search">
				<input type="text" placeholder="Поиск по сайту">
			</div>
			<div class="header__menu">
				<a href="<?= get_module_url('compare')?>"><span><i class="fa fa-compress"></i> Compare</span></a>
				<a href="<?= get_module_url('favorites')?>"><span><i class="fa fa-heart"></i> Favorites</span></a>
				<a href="<?= get_module_url('basket')?>"><span><i class="fa fa-shopping-cart"></i> Basket</span></a>
				<a href="<?= get_module_url('shops')?>"><span><i class="fa fa-home"></i> Shops</span></a>
				<a href="<?= get_module_url('contacts')?>"><span><i class="fa fa-phone"></i> Contacts</span></a>
			</div>
		</div>
	</div>
</header>-->

<div class="header">
	<div class="container ">
		<div class="header__row">
			<a href="<?= '/'.LANG.'/'.$module['alias_'.LANG]?>">
				<img src="/images/png/Logo.png" alt="">
			</a>
			<nav class="nav">
				<ul class="header__main__nav">
					<input class="input_search" value type="search" placeholder="Поиск по сайту"
					<li><a href="<? get_module_url('home')?>">Home</a></li>
					<li><a href="<? get_module_url('catalog')?>">Shop</a></li>
					<li><a href="<? get_module_url('blog')?>">Blog</a></li>
					<li><a href="<? get_module_url('')?>">Pages</a></li>
					<li><a href="<? get_module_url('contacts')?>">Contacts</a></li>
				</ul>
				<ul class="header__shop__nav">
					<li><button><i class="fas fa-search"></i></button></li>
					<li><button><i class="fas fa-shopping-cart"></i></button></li>
					<li><a href="<? get_module_url('')?>">Buy Now</a></li>
				</ul>
			</nav>
		</div>
	</div>
</div>