<?php

namespace Buildtalent\Course\Updates;

use Illuminate\Support\Facades\DB;
use Schema;
use October\Rain\Database\Updates\Migration;

class Migration101 extends Migration
{
    public function up()
    {
        $sql = <<<SQL
        -- phpMyAdmin SQL Dump
        -- version 4.8.4
        -- https://www.phpmyadmin.net/
        --
        -- Host: 127.0.0.1:3306
        -- Generation Time: Aug 15, 2021 at 05:21 PM
        -- Server version: 5.7.24
        -- PHP Version: 7.3.1

        SET AUTOCOMMIT = 0;
        START TRANSACTION;
        SET time_zone = "+00:00";


        /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
        /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
        /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
        /*!40101 SET NAMES utf8mb4 */;

        --
        -- Database: `buildtalent`
        --

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_`
        --

        DROP TABLE IF EXISTS `buildtalent_course_`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `price` int(11) NOT NULL,
          `status` int(11) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `deleted_at` timestamp NULL DEFAULT NULL,
          `description` text,
          `excerpt` text,
          `author` varchar(255) DEFAULT NULL,
          `category_id` smallint(6) NOT NULL,
          `course_image` varchar(255) DEFAULT NULL,
          `level` int(11) DEFAULT NULL,
          `video_intro` varchar(255) DEFAULT NULL,
          `price_before_discount` int(11) DEFAULT NULL,
          `include_in_course` varchar(255) DEFAULT NULL,
          `skill_gained` text,
          `requirements` text,
          `joined_user` int(11) DEFAULT '0',
          `slug` varchar(255) NOT NULL,
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_category`
        --

        DROP TABLE IF EXISTS `buildtalent_course_category`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_category` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `deleted_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_course_user`
        --

        DROP TABLE IF EXISTS `buildtalent_course_course_user`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_course_user` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `course_id` int(11) NOT NULL,
          `user_id` int(11) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `payment_method` varchar(255) NOT NULL,
          `payment_status` int(11) NOT NULL DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_lessons`
        --

        DROP TABLE IF EXISTS `buildtalent_course_lessons`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_lessons` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `section_id` int(11) DEFAULT NULL,
          `name` varchar(255) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `deleted_at` timestamp NULL DEFAULT NULL,
          `media` varchar(255) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_sections`
        --

        DROP TABLE IF EXISTS `buildtalent_course_sections`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_sections` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `course_id` int(11) DEFAULT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          `deleted_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_tags`
        --

        DROP TABLE IF EXISTS `buildtalent_course_tags`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_tags` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ;

        -- --------------------------------------------------------

        --
        -- Table structure for table `buildtalent_course_tag_user`
        --

        DROP TABLE IF EXISTS `buildtalent_course_tag_user`;
        CREATE TABLE IF NOT EXISTS `buildtalent_course_tag_user` (
          `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `tag_id` int(11) NOT NULL,
          `user_id` int(11) NOT NULL,
          `created_at` timestamp NULL DEFAULT NULL,
          `updated_at` timestamp NULL DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ;
        COMMIT;

        /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
        /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
        /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SQL;

        DB::unprepared($sql);
    }

    public function down()
    {
        Schema::dropIfExists('buildtalent_course_');
        Schema::dropIfExists('buildtalent_course_category');
        Schema::dropIfExists('buildtalent_course_course_user');
        Schema::dropIfExists('buildtalent_course_lessons');
        Schema::dropIfExists('buildtalent_course_sections');
        Schema::dropIfExists('buildtalent_course_tags');
        Schema::dropIfExists('buildtalent_course_tag_user');
    }
}