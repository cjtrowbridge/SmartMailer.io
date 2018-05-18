-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2018 at 06:09 AM
-- Server version: 5.5.60-0+deb8u1
-- PHP Version: 7.0.30-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `smartmailer.io`
--

-- --------------------------------------------------------

--
-- Table structure for table `Campaigns`
--

CREATE TABLE `Campaigns` (
  `CampaignID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Query` longtext,
  `Message` longtext,
  `LastRun` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LastAppointment` datetime NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `MessageID` int(11) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Message` longtext NOT NULL,
  `CampaignID` int(11) NOT NULL,
  `Queued` datetime NOT NULL,
  `Sent` datetime DEFAULT NULL,
  `Hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Campaigns`
--
ALTER TABLE `Campaigns`
  ADD PRIMARY KEY (`CampaignID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `Hash` (`Hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Campaigns`
--
ALTER TABLE `Campaigns`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;
