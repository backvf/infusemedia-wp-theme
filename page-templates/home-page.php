<?php
/**
 * Template Name: Home Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();



?>

<style>
.revs {
  padding: 70px 0;
  background: #F5F5F5;
}

.revs img {
  display: block;
  width: 100%;
}

.revs__title {
  text-align: center;
  margin-bottom: 60px;
}

.revs-tabs {
  margin-top: 40px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}

.revs-tab:not(:last-child) {
  margin-right: 27px;
  padding-right: 27px;
  border-right: #1C3C70 solid 1px;
}

.revs-tab {
  min-height: 28px;
  padding-top: 5px;
  padding-bottom: 5px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.revs-tab-link {
  display: block;
  font-size: 22px;
  line-height: 24px;
  color: #1C3C70;
  border-bottom: transparent solid 2px;
  cursor: pointer;
  -webkit-transition: color .3s, border .3s;
  transition: color .3s, border .3s;
}

.revs-tab-link:hover {
  border-color: #1C3C70;
  text-decoration: none;
}

.revs-tab.active .revs-tab-link {
  color: #FE8836;
  border-color: transparent;
  pointer-events: none;
}

.revs-slides {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
}

.revs-slide {
  width: 100%;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
  -webkit-box-ordinal-group: 3;
  -ms-flex-order: 2;
  order: 2;
}

.revs-slide.active {
  opacity: 1;
  visibility: visible;
  pointer-events: all;
  -webkit-box-ordinal-group: 2;
  -ms-flex-order: 1;
  order: 1;
  -webkit-transition: opacity .3s, visibility .3s;
  transition: opacity .3s, visibility .3s;
}

.revs-slide-inner {
  margin: 0 auto;
}

.revs-slide[data-revs="2019"],
.revs-slide[data-revs="2020"] {
  padding-top: 10px;
}

.revs-slide-inner--2020 {
  max-width: 1300px;
}

.revs-slide-inner--2021 {
  max-width: 1330px;
}

.revs-row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -15px;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
}

.revs-col {
  padding: 0 15px;
  position: relative;
}

.revs-rev {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  background: #fff;
  -webkit-box-shadow: 0px -2.49655px 31.2068px rgba(109, 109, 109, 0.15), 0px -1.1251px 8.24788px rgba(0, 0, 0, 0.0352419), 0px -0.75218px 4.90401px rgba(0, 0, 0, 0.0209473);
  box-shadow: 0px -2.49655px 31.2068px rgba(109, 109, 109, 0.15), 0px -1.1251px 8.24788px rgba(0, 0, 0, 0.0352419), 0px -0.75218px 4.90401px rgba(0, 0, 0, 0.0209473);
}

.revs-rev-left {
  -ms-flex-negative: 0;
  flex-shrink: 0;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.revs-rev-right {
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  padding: 5px 25px;
  font-size: 15px;
  line-height: 19px;
}

.revs-rev-name {
  color: #1C3C70;
  font-weight: 700;
}

.revs-rev-name span {
  font-weight: 400;
  color: #0097DD;
}

.revs-rev-pos {
  font-size: 13px;
  line-height: 22px;
  color: #BFBFBF;
}

.revs-rev-text {
  color: #585858;
  max-width: 300px;
  margin-top: 5px;
}

.revs-quote {
  text-align: center;
}

.revs-quote-text {
  font-size: 20px;
  line-height: 26px;
  color: #1C3C70;
  font-style: italic;
  font-weight: 400;
}

.revs-qu {
  position: absolute;
  width: 82px;
}

.revs-qu--s2 {
  width: 61px;
}

.revs-qu--o {
  left: 15px;
  top: 0;
}

.revs-qu--c {
  right: 15px;
  bottom: 0;
}

.revs-quote-cont {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;
}

.revs-stars {
  width: 100%;
  max-width: 997px;
  margin: 0 auto;
  pointer-events: none;
}

.revs-stars img:nth-child(2) {
  display: none;
}

.revs-stars--1 {
  margin-top: -26px;
  margin-bottom: -58px;
}

.revs-stars--2 {
  margin-top: -16px;
  margin-bottom: -36px;
}

.revs-stars--3 {
  margin-top: -50px;
  margin-bottom: -22px;
  z-index: 1;
  position: relative;
}

.revs-col--f {
  width: 100%;
}

.revs-rev--s1 {
  height: 118px;
}

.revs-rev--s1 .revs-rev-left {
  width: 118px;
}

.revs-rev--s2 {
  height: 137px;
}

.revs-rev--s2 .revs-rev-left {
  width: 137px;
}

.revs-rev--s3 {
  height: 97px;
}

.revs-rev--s3 .revs-rev-left {
  width: 97px;
}

.revs-col--1-1 {
  width: 544px;
  padding-left: 56px;
  padding-top: 29px;
}

.revs-col--1-2 {
  width: 360px;
  padding-top: 42px;
}

.revs-col--1-3 {
  width: 110px;
  padding-top: 46px;
}

.revs-col--1-4 {
  width: 272px;
  padding-top: 42px;
}

.revs-col--1-5 {
  width: 446px;
  padding-top: 90px;
}

.revs-col--1-6 {
  width: 380px;
}

.revs-award--1-6 {
  width: 146px;
}

.revs-col--1-7 {
  width: 547px;
  padding-right: 31px;
  padding-bottom: 30px;
}

.revs-col--2-1 {
  width: 420px;
  padding-top: 31px;
  margin-left: 80px;
  margin-right: 60px;
}

.revs-quote--2-1 {
  width: 277px;
}

.revs-quote-img {
  width: 70px;
}

.revs-col--2-2 {
  width: 551px;
  padding-left: 83px;
  padding-top: 30px;
}

.revs-col--2-3 {
  width: 165px;
  padding-top: 26px;
}

.revs-col--2-4 {
  width: 469px;
  padding-right: 28px;
  padding-bottom: 33px;
  padding-top: 21px;
}

.revs-col--2-5 {
  width: 151px;
  padding-top: 26px;
}

.revs-col--2-6 {
  width: 461px;
  padding-top: 53px;
  margin-right: 10px;
}

.revs-quote--2-6 {
  width: 290px;
}

.revs-quote-cont--2-6 {
  -webkit-box-orient: horizontal;
  -webkit-box-direction: reverse;
  -ms-flex-direction: row-reverse;
  flex-direction: row-reverse;
  -webkit-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
}

.revs-col--3-1 {
  width: 370px;
  padding-top: 40px;
}

.revs-col--3-2 {
  width: 515px;
  padding-top: 30px;
  padding-left: 77px;
}

.revs-col--3-3 {
  width: 330px;
  padding-top: 45px;
  margin-right: 95px;
}

.revs-quote-img--3-3 {
  position: absolute;
  right: -100px;
  top: 250px;
}

.revs-col--3-4 {
  width: 145px;
  margin-top: -45px;
  margin-left: 15px;
}

.revs-col--3-5 {
  width: 590px;
  padding-top: 62px;
  margin-right: 60px;
  margin-left: 30px;
}

.revs-quote-img--3-5 {
  width: 163px;
  padding-bottom: 10px;
}

.revs-quote--3-5 {
  width: 330px;
}

.revs-col--3-6 {
  width: 550px;
  padding-right: 82px;
  padding-bottom: 30px;
}

.revs-col--3-7 {
  width: 181px;
  padding-top: 40px;
}

.revs-col--3-8 {
  width: 149px;
  margin-left: -40px;
  margin-right: 20px;
  margin-top: -155px;
}

@media only screen and (max-width: 1600px) {
  .revs-block {
    max-width: 1110px;
    margin: 0 auto;
  }
  .revs-col--1-2 {
    width: 240px;
  }
  .revs-col--1-4 {
    width: 240px;
  }
  .revs-col--1-5 {
    width: 280px;
  }
  .revs-col--1-6 {
    width: 176px;
  }
  .revs-col--2-1 {
    width: 400px;
    margin-right: 0;
    margin-left: 0;
  }
  .revs-col--3-1 {
    width: 210px;
    margin-left: 0;
    padding-top: 10px;
  }
  .revs-col--3-3 {
    width: 230px;
    padding-top: 30px;
    margin-right: 0;
  }
  .revs-quote-img--3-3 {
    top: 90px;
    left: auto;
    right: 0;
  }
  .revs-col--3-4 {
    margin-top: -45px;
    margin-left: 0;
  }
  .revs-col--3-5 {
    width: 410px;
    margin-right: 20px;
    margin-left: 0;
  }
  .revs-quote--3-5 {
    width: 260px;
  }
  .revs-col--3-7 {
    padding-top: 30px;
  }
  .revs-col--3-8 {
    margin-top: 20px;
  }
}

@media only screen and (max-width: 1279px) {
  .revs-col {
    -webkit-box-ordinal-group: 5;
    -ms-flex-order: 4;
    order: 4;
  }
  .revs__title {
    margin-bottom: 45px;
  }
  .revs-col--1-2,
  .revs-col--1-4 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
  }
  .revs-col--1-2 {
    margin-left: 80px;
    padding-top: 0;
    width: 360px;
  }
  .revs-col--1-4 {
    margin-right: 80px;
    padding-top: 27px;
    width: 272px;
  }
  .revs-col--1-3 {
    margin-right: 160px;
  }
  .revs-col--1-6 {
    width: 163px;
  }
  .revs-col--f1,
  .revs-col--1-1,
  .revs-col--1-3,
  .revs-col--1-7 {
    -webkit-box-ordinal-group: 3;
    -ms-flex-order: 2;
    order: 2;
  }
  .revs-stars {
    max-width: 710px;
  }
  .revs-stars--1 {
    margin-bottom: -20px;
  }
  .revs-col--1-5 {
    margin-right: 90px;
    width: 446px;
  }
  .revs-col--1-7 {
    margin-left: 600px;
    margin-bottom: -75px;
  }
  .revs-col--1-6 {
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 3;
    margin-left: 160px;
  }
  .revs-award--1-6 {
    width: 100%;
  }
  .revs-col--1-2 {
    margin-left: 86px;
  }
  .revs-col--1-4 {
    margin-right: 0;
  }
  .revs-quote--1-4 {
    text-align: right;
  }
  .revs-col--1-3 {
    margin-right: 75px;
    margin-top: -15px;
  }
  .revs-col--1-1 {
    margin-top: -35px;
  }
  .revs-col--1-7 {
    margin-left: 190px;
  }
  .revs-col--1-6 {
    margin-left: 17px;
  }
  .revs-col--1-5 {
    margin-right: 100px;
  }
  .revs-stars--1 {
    margin-top: -10px;
  }
  .revs-col--2-1 {
    width: 186px;
    padding-top: 0;
  }
  .revs-quote-img--2-1 {
    position: absolute;
    right: 0;
    top: 125px;
  }
  .revs-stars--2 {
    margin-top: 54px;
  }
  .revs-col--f2,
  .revs-col--2-1,
  .revs-col--2-2,
  .revs-col--2-4,
  .revs-col--2-5,
  .revs-col--2-6 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
  }
  .revs-stars--2 {
    margin-top: 50px;
    margin-bottom: -30px;
  }
  .revs-col--2-2 {
    margin-top: 20px;
  }
  .revs-col--2-5 {
    margin-top: -20px;
    margin-right: 90px;
  }
  .revs-col--2-6 {
    padding-top: 26px;
    width: 430px;
    margin-left: 36px;
  }
  .revs-quote-cont--2-6 {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  .revs-col--2-3 {
    margin-top: -12px;
    padding-top: 0;
    margin-right: -20px;
  }
  .revs-col--3-1,
  .revs-col--3-2,
  .revs-col--3-7,
  .revs-col--3-3 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
  }
  .revs-col--3-1 {
    width: 370px;
    margin-left: 245px;
  }
  .revs-col--3-2 {
    margin-top: -10px;
    margin-left: 20px;
  }
  .revs-col--3-3 {
    width: 100%;
    margin-left: 0;
    padding-top: 0;
    padding-right: 15px;
    margin-top: 30px;
  }
  .revs-quote-img--3-3 {
    right: 35px;
    top: -150px;
  }
  .revs-col--f3 {
    -webkit-box-ordinal-group: 3;
    -ms-flex-order: 2;
    order: 2;
  }
  .revs-col--3-4,
  .revs-col--3-6 {
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 3;
  }
  .revs-stars--3 {
    margin-top: 20px;
    margin-bottom: -15px;
  }
  .revs-col--3-4 {
    margin-top: 0;
    padding-top: 40px;
    margin-left: 15px;
  }
  .revs-col--3-6 {
    width: 550px;
  }
  .revs-col--3-5 {
    padding-top: 14px;
    width: 410px;
    margin-left: 90px;
  }
  .revs-quote--3-5 {
    text-align: left;
    width: 160px;
  }
  .revs-col--3-7 {
    padding-top: 100px;
    margin-right: 20px;
  }
  .revs-col--3-8 {
    width: 112px;
    margin-right: 130px;
    margin-top: 2px;
  }
}

@media only screen and (max-width: 767px) {
  .revs {
    padding: 30px 0 25px 0;
  }
  .revs__title {
    margin-bottom: 20px;
  }
  .revs-tabs {
    margin-top: 20px;
    position: relative;
  }
  .revs-tab:not(:last-child) {
    margin-right: 17px;
    padding-right: 17px;
  }
  .revs-tab {
    min-height: 24px;
  }
  .revs-tab-link {
    display: block;
    font-size: 14px;
    line-height: 14px;
    border-width: 1px;
  }
  .revs-row {
    position: relative;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: -40px;
  }
  .revs-qu {
    width: 49px;
  }
  .revs-qu--c {
    right: 15px;
    bottom: -17px;
  }
  .revs-rev {
    height: 85px;
  }
  .revs-rev-left {
    width: 85px !important;
  }
  .revs-rev-right {
    padding: 5px 5px 5px 15px;
  }
  .revs-rev-name {
    font-size: 10px;
    line-height: 12px;
  }
  .revs-rev-pos {
    font-size: 9px;
    line-height: 14px;
  }
  .revs-rev-text {
    font-size: 9px;
    line-height: 11px;
  }
  .revs-stars img:nth-child(1) {
    display: none;
  }
  .revs-stars img:nth-child(2) {
    display: block;
  }
  .revs-slide {
    padding-top: 0 !important;
  }
  .revs-row {
    margin-left: -10px;
    margin-right: -10px;
  }
  .revs-col {
    -webkit-box-ordinal-group: 5;
    -ms-flex-order: 4;
    order: 4;
    width: 100%;
    margin: 0 0 30px 0;
    padding: 0 10px;
  }
  .revs-quote {
    text-align: left;
    margin: 0;
    padding: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: auto;
  }
  .revs-quote-text {
    font-size: 16px;
    line-height: 20px;
  }
  .revs-quote-cont {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
  }
  .revs-quote-img {
    width: 60px;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    margin-right: 20px;
    position: static;
  }
  .revs-col--f {
    top: 97px;
    left: 0;
    position: absolute;
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
    z-index: 1;
  }
  .revs-stars {
    margin: 0;
  }
  .revs-col--1-1,
  .revs-col--2-2,
  .revs-col--3-2 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
    margin-bottom: 48px;
    padding-top: 30px;
    padding-left: 23px;
  }
  .revs-col--1-2,
  .revs-col--1-4,
  .revs-col--1-5,
  .revs-col--2-1,
  .revs-col--2-6,
  .revs-col--3-3,
  .revs-col--3-5 {
    -webkit-box-ordinal-group: 3;
    -ms-flex-order: 2;
    order: 2;
  }
  .revs-col--1-7,
  .revs-col--2-4,
  .revs-col--3-1,
  .revs-col--3-6 {
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 3;
    padding-right: 23px;
  }
  .revs-col--1-3 {
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 5;
  }
  .revs-col--1-6 {
    width: 115px;
  }
  .revs-col--1-3 {
    width: 84px;
  }
  .revs-col--2-3 {
    width: 128px;
  }
  .revs-col--2-5 {
    width: 91px;
  }
  .revs-col--2-1 {
    padding-top: 10px;
  }
  .revs-col--2-1,
  .revs-col--2-6 {
    margin-bottom: 40px;
  }
  .revs-col--3-4 {
    width: 117px;
  }
  .revs-col--3-7 {
    width: 111px;
    -webkit-box-ordinal-group: 6;
    -ms-flex-order: 5;
    order: 5;
  }
  .revs-col--3-8 {
    width: 106px;
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 3;
  }
}

@media only screen and (max-width: 1600px) and (min-width: 1280px) {
  .revs-col--3-1 {
    margin-left: 100px;
  }
  .revs-col--3-3 {
    margin-right: 70px;
  }
  .revs-col--3-4 {
    margin-top: -85px;
  }
  .revs-col--3-8 {
    margin-right: 0;
  }
  .revs-stars--3 {
    margin-top: -10px;
    margin-bottom: -10px;
  }
  .revs-quote-img--3-3 {
    right: -70px;
    top: 80px;
  }
}
  
  

</style>

<section class="intro">
	<div class="intro__block">
		<div class="intro__bg">
			<img src="<?php the_field("intro_image"); ?>" alt="">
		</div>
		<div class="cover cover--intro">
			<div class="intro__row">
				<div class="intro__left">
					<p class="intro__text">
						<?php the_field("intro_title"); ?>
					</p>
					<h1 class="intro__ttl">
						<?php the_field("intro_subtitle"); ?>
					</h1>
				</div>
				<div class="intro__right">
					<div class="intro__play">
						<a href="<?php the_field("intro_video_link"); ?>" data-fancybox class="intro__play-icon">
							<img class="intro__play-r" src="/wp-content/themes/infusemedia/frontend/images/intro-play.svg" alt="">
							<img class="intro__play-t" src="/wp-content/themes/infusemedia/frontend/images/intro-play2.svg" alt="">
						</a>
						<div class="intro__play-text">
							Watch video
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="intro__bot">
		<div class="intro__item intro__item--1">
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-text">
						<?php the_field("intro_item_1_text"); ?>
					</div>
				</div>
				<div class="intro__item-img">
					<img src="/images/Group-494.svg" alt="">
				</div>
			</div>
		</div>
		<div class="intro__item intro__item--2">
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-text">
						<?php the_field("intro_item_2_text"); ?>
					</div>
				</div>
				<div class="intro__item-img">
					<img src="/wp-content/themes/infusemedia/frontend/images/content/icon-logo-2.svg" alt="Entrepreneur 360">
				</div>
			</div>
		</div>
		<a href="<?php the_field("intro_last_item_link"); ?>" class="intro__item intro__item--3">
			<div class="intro__item-bg">
				<picture>
					<source srcset="/wp-content/themes/infusemedia/frontend/images/intro-i2.jpg" media="(max-width: 767px)">
					<source srcset="/wp-content/themes/infusemedia/frontend/images/intro-i.jpg">
					<img src="/wp-content/themes/infusemedia/frontend/images/intro-i.jpg" />
				</picture>
			</div>
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-all">
						SEE ALL OUR<br> ACCOLADES
					</div>
					<div class="intro__item-arrow">
						<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"/></svg>
					</div>
				</div>
			</div>
		</a>
	</div>
</section>


<!-- (link) -->
<!-- <?php get_template_part('global-templates/cta', null, ['position' => 'after_hero']); ?> -->
<!-- End (link) -->

<!-- (clients' love) -->
<?php the_field('widget'); ?>	
<!-- End (clients' love) -->

<!-- (info) -->
<section class="info">
	<div class="info__cover cover">
		<h2 class="h2 info__title"><?php the_field('info_title'); ?></h2>
		<h3 class="h3 info__sub-title"><?php the_field('info_subtitle'); ?></h3>
		<p class="info__text"><?php the_field('info_text'); ?></p>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_info']); ?>
<!-- End (info) -->
<!-- (solutions) -->
<section class="solutions">
	<div class="solutions__first-section">
		<div class="solutions__cover cover">
			<div class="solutions__wrapper">
				<div class="solutions__info">
					<h4 class="h2 solutions__info-sub-title"><?php the_field('solutions_title'); ?></h4>
					<h3 class="solutions__info-title"><?php the_field('solutions_subtitle'); ?></h3>
					<p class="solutions__info-text"><?php the_field('solutions_text'); ?></p>
				</div>
				<?php $items = get_field('solutions_items'); ?>
				<div class="solutions__list">
					<?php $i = 0;?>
					<?php foreach ($items as $item):
						$i++;
						if($i > 2) {
							break;
						}
						?>
						<div class="solutions__item">
							<div class="solutions__item-bg">
								<div class="solutions__item-bg-wrapper"></div>
							</div>
							<!-- (solution) -->
							<div class="solution solution_white-theme <?php echo $i == 1 ? 'opened' : ''; ?>">
								<div class="solution__wrapper">
									<div class="solution__number">
								  <span>
									<?php echo sprintf('%02d', $i);; ?>
									<svg class="solution__icon-arrow">
									  <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
									</svg>
								  </span>
									</div>
									<h5 class="h4 solution__name"><?php echo $item['item_title']?></h5>
									<div class="solution__content">
										<p class="solution__description"><?php echo $item['item_text']?></p>
									</div>
								</div>
								<div class="solution__link-container">
									<a href="<?php echo $item['item_page_link'] ?>" class="solution__link">
										<?php echo $item['item_link_text'] ?>
										<svg class="solution__icon-pointer">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
										</svg>
									</a>
								</div>
							</div>
							<!-- End (solution) -->
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="solutions__last-section">
		<div class="solutions__cover cover">
			<div class="solutions__list">
				<?php $i = 0;?>
				<?php foreach ($items as $item):
					$i++;
					if($i < 3) {
						continue;
					}
					?>
					<div class="solutions__item">
						<div class="solutions__item-bg">
							<div class="solutions__item-bg-wrapper"></div>
						</div>
						<!-- (solution) -->
						<div class="solution <?php echo $i == 6 ? 'solution_white-theme' : ''; ?>">
							<div class="solution__wrapper">
								<div class="solution__number">
								<span>
								  <?php echo sprintf('%02d', $i); ?>
								  <svg class="solution__icon-arrow">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
								  </svg>
								</span>
								</div>
								<h5 class="h4 solution__name"><?php echo $item['item_title']?></h5>
								<div class="solution__content">
									<p class="solution__description"><?php echo $item['item_text']?></p>
								</div>
							</div>
							<div class="solution__link-container">
								<a href="<?php echo $item['item_page_link']?>" class="solution__link">
									<?php echo $item['item_link_text']?>
									<svg class="solution__icon-pointer">
										<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
									</svg>
								</a>
							</div>
						</div>
						<!-- End (solution) -->
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_solutions']); ?>

<!-- End (solutions) -->
<!-- (insights) -->
<section class="insights">
	<div class="insights__cover cover">
		<div class="insights__heading">
			<h3 class="h2 insights__title"><?php the_field('insights_title'); ?></h3>
			<p class="insights__text"><?php the_field('insights_text'); ?></p>
			<div class="insights__link-container">
				<a href="<?php the_field('insights_link_page'); ?>" class="insights__link">
					<?php the_field('insights_link_text'); ?>
					<svg class="insights__link-icon-pointer">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
					</svg>
				</a>
			</div>
		</div>

        <?php $insights = get_posts([
            'post_type' => 'insights',
            'numberposts' => 32,
        ]);
        $slides = [];
        $i = 1;
        $current_slide_size = 0;
        $max_slide_size = 4;
        $max_slides = 8;
        foreach ($insights as $insight) {
            $size = get_field('size', $insight->ID) ?: 1 ;
            if (($current_slide_size + $size) > $max_slide_size) {
                $i++;
                $current_slide_size = 0;
            }
            if($i > $max_slides) {
                break;
            }
            $slides[$i][] = $insight;
            $current_slide_size += $size;
        }
        ?>

        <div class="insights__wrapper">
			<div class="insights__list" id="insights">
				<?php foreach ($slides as $slide):?>
					<div class="insights__slide">
						<div class="insights__elements-list">
                            <?php foreach ($slide as $insight):?>
                                <div class="insights__element-item text-<?php the_field("preview_text_color",$insight->ID); ?> <?php echo (get_field('size', $insight->ID) == 2) ? 'insights__element-item_big' : '' ?>">
                                    <!-- (insight) -->
                                    <div class="insight insight_<?php echo get_field('theme', $insight->ID) ?: 'blue'; ?>">
                                        <?php if (has_post_thumbnail($insight)):?>
                                                <?php $attachment_id = get_post_thumbnail_id( $insight->ID );?>
                                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'medium' )?>"
                                                     alt="<?php echo get_the_title( $insight );?>" class="insight__img">
                                        <?php endif;
                                        $insight_categories = get_the_category($insight->ID);
                                        $insight_categories_names = [];
                                        foreach ($insight_categories as $insight_category) {
                                            $insight_categories_names[] = $insight_category->name;
                                        }
                                        ?>
                                        <div class="insight__cover">
                                            <a href="<?php echo get_the_permalink($insight->ID); ?>" class="insight__main-text <?php echo in_array('Webinar', $insight_categories_names) ? 'disable-hover': '';?>">
                                                <div class="insight__main-text-container"><?php echo get_field('excerpt', $insight->ID) ; ?></div>
                                                <svg class="insight__main-text-icon-pointer">
                                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                                                </svg>
                                            </a>
                                            <div class="insight__label"><?php echo implode(', ', $insight_categories_names);?></div>
                                            <div class="insight__content">
                                                <h6 class="insight__title"><?php echo get_the_title($insight->ID); ?></h6>
                                                <p class="insight__description"><?php echo get_field('subtitle', $insight->ID); ?></p>
                                            </div>
                                            <?php if (in_array('Webinar', $insight_categories_names)):?>
                                                <div class="insight__webinar-info-container">
                                                    <?php if( have_rows('infuse2020_insights_layout', $insight->ID) ):
                                                        while ( have_rows('infuse2020_insights_layout', $insight->ID) ) : the_row();
                                                            if( get_row_layout() == 'header_banner_form' ):
                                                                $video_duration = get_sub_field('video_duration');
                                                                if($video_duration): ?>
                                                                <div class="insight__webinar-info-duration">
                                                                    <?php echo $video_duration; ?>
                                                                </div>
                                                            <?php endif;
                                                            endif;
                                                        endwhile;
                                                    endif; ?>
                                                    <div class="insight__webinar-info-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                                            <path d="M48 0C48 16.0164 48 31.9753 48 48C31.9863 48 16.0274 48 0 48C0 31.9836 0 16.0274 0 0C16.0219 0 31.9781 0 48 0ZM17.9955 34.3574C22.8665 30.8624 27.595 27.4717 32.4331 24.0014C27.5703 20.5009 22.8391 17.0965 17.9955 13.6097C17.9955 20.5859 17.9955 27.3702 17.9955 34.3574Z" fill="white" fill-opacity="0.8"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="insight__link-container">
                                                    <a href="<?php echo get_the_permalink($insight->ID); ?>" class="insight__link">
                                                        Read more
                                                        <svg class="insight__link-icon-pointer">
                                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End (insight) -->
                                </div>
                            <?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="insights__controls" id="insights-controls">
			<div class="insights__dots" id="insights-dots"></div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_insights']); ?>

<!-- End (insights) -->
<!-- (advantages) -->
<section class="advantages">
	<div class="advantages__cover cover">
		<div class="advantages__list">
			<?php while (have_rows('advantages_items')) : the_row(); ?>
			<div class="advantages__item">
				<div class="advantages__item-content">
					<h5 class="advantages__item-title"><?php echo the_sub_field('item_title')?></h5>
					<p class="advantages__item-text"><?php echo the_sub_field('item_text')?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<!-- End (advantages) -->
<!-- (about) -->
<section class="about">
	<div class="about__wrapper">
		<div class="about__cover cover">
			<div class="about__info">
				<img src="<?php echo get_template_directory_uri() ?>/frontend/images/bg-about.svg" alt=""
					 class="about__bg">
				<div class="about__info-wrapper">
					<h3 class="h2 about__title"><?php echo the_field('advantages_title')?></h3>
					<p class="about__text"><?php echo the_field('advantages_text')?></p>
				</div>
				<div class="about__control-container">
					<a href="#video" data-fancybox class="about__control-label"><?php echo the_field('advantages_video_button')?></a>
					<a href="#video" data-fancybox class="about__control-btn">
						<svg class="about__control-btn-icon">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play"></use>
						</svg>
					</a>
					<div class="about__control-line"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="about__video">
		<div class="about__video-content">
			<video width="800" height="450" controls id="video" style="display:none;">
				<source src="<?php echo the_field('advantages_video')?>" type="video/mp4">
			</video>
			<a href="#video" data-fancybox class="about__video-event-block">
				<img src="<?php echo the_field('advantages_video_image')?>" alt=""
					 class="about__video-img">
				<svg class="about__video-icon-play about__video-icon-play_not-active">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play-not-active"></use>
				</svg>
				<svg class="about__video-icon-play about__video-icon-play_active">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play-active"></use>
				</svg>
			</a>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_advantages']); ?>

<!-- End (about) -->
<!-- (reviews) -->
<section class="reviews">
	<div class="reviews__bg">
		<div class="reviews__bg-wrapper" style="background-image: url(<?php the_field('testimonials_image'); ?>)"></div>
	</div>
	<div class="reviews__cover cover">
		<div class="reviews__wrapper">
			<div class="reviews__left-content">
				<h3 class="h2 reviews__title"><?php echo the_field('testimonials_title')?></h3>

				<div class="reviews__sub-carousel-wrapper">
					<div class="reviews__sub-carousel" id="reviews-sub-carousel">
						<?php $testimonials = get_posts([
                            'post_type' => 'testimonials',
                            'numberposts' => -1,
                        ]); ?>
						<?php foreach ($testimonials as $testimonial): ?>
							<div class="reviews__sub-carousel-slide">
							<!-- (user) -->
							<div class="user reviews__user">
                                <?php if (has_post_thumbnail($testimonial)):?>
                                <div class="user__img-container">
                                    <?php $attachment_id = get_post_thumbnail_id( $testimonial->ID );?>
                                    <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'thumbnail' )?>"
                                         alt="<?php echo get_the_title( $testimonial );?>" class="user__img reviews__sub-user-img">
								</div>
                                <?php endif; ?>
                                <div class="user__info">
                                    <h6 class="h6 user__name reviews__sub-user-name"><?php echo get_the_title( $testimonial );?></h6>
                                    <div class="user__company reviews__sub-user-company"><?php echo get_field('testimonials_company', $testimonial->ID); ?></div>
                                    <div class="user__position reviews__sub-user-position"><?php echo get_field('testimonials_job_title', $testimonial->ID); ?></div>
								</div>
							</div>
							<!-- End (user) -->
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="reviews__right-content">
                <div class="reviews__link-wrapper">
                    <a href="<?php echo the_field('testimonials_link_page')?>" class="reviews__link link__text">
                        <span><?php echo the_field('testimonials_link_text')?></span>
                        <svg class="link__pointer">
                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                        </svg>
                    </a>
                </div>
				<div class="reviews__dots-wrapper">
					<div class="reviews__quotes">
						<svg class="reviews__quotes-icon">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-quotes"></use>
						</svg>
					</div>
					<div class="reviews__dots-container" id="reviews-dots"></div>
				</div>
				<div class="reviews__list-wrapper">
					<div class="reviews__list" id="reviews-list">
						<?php
						array_push($testimonials, array_shift($testimonials));
						array_push($testimonials, array_shift($testimonials));
						foreach ($testimonials as $testimonial): ?>
							<div class="reviews__item">
								<div class="reviews__item-text">
									<div class="reviews__item-text-wrapper">
                                        <?php echo get_post_field('post_content', $testimonial->ID);?>
									</div>
								</div>
								<div class="reviews__item-user">
									<!-- (user) -->
									<div class="user reviews__user">
                                        <?php if (has_post_thumbnail($testimonial)):?>
                                            <div class="user__img-container">
                                                <?php $attachment_id = get_post_thumbnail_id( $testimonial->ID );?>
                                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'thumbnail' )?>"
                                                     alt="<?php echo get_the_title( $testimonial );?>" class="user__img reviews__sub-user-img">
                                            </div>
                                        <?php endif; ?>
										<div class="user__info">
                                            <h6 class="h6 user__name"><?php echo get_the_title( $testimonial );?></h6>
                                            <div class="user__company"><?php echo get_field('testimonials_company', $testimonial->ID); ?></div>
                                            <div class="user__position"><?php echo get_field('testimonials_job_title', $testimonial->ID); ?></div>
										</div>
									</div>
									<!-- End (user) -->
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="reviews__arrows-container" id="reviews-arrows"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_reviews']); ?>

<!-- End (reviews) -->
<!-- (clients) -->
<section class="clients">
	<div class="clients__cover cover">
		<h3 class="h2 clients__title"><?php echo the_field('clients_title')?></h3>
		<div class="clients__container" id="clients">
			<div class="clients__list">
				<?php $clients = get_posts([
                    'post_type' => 'clients',
                    'numberposts' => -1,
                ])?>
				<?php foreach ($clients as $client):?>
                    <?php if (has_post_thumbnail($client)):?>
                        <?php $attachment_id = get_post_thumbnail_id( $client->ID );?>
                        <div class="clients__item">
                            <div class="clients__item-wrapper">
                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'full' )?>"
                                     alt="<?php echo get_the_title( $testimonial );?>" class="clients__item-img">
                            </div>
                        </div>
                    <?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_clients']); ?>

<!-- End (clients) -->

<?php get_footer(); ?>