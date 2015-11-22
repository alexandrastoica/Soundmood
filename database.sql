-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2015 at 01:52 AM
-- Server version: 5.6.23
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `redhugci_songs`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `AlbumID` int(3) NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(32) NOT NULL,
  `Cover` varchar(200) NOT NULL,
  PRIMARY KEY (`AlbumID`),
  KEY `AlbumID` (`AlbumID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumID`, `AlbumName`, `Cover`) VALUES
(1, 'Lean On - Single', 'https://i1.sndcdn.com/artworks-000108593302-0ek7n6-t500x500.jpg'),
(2, 'Summertime Sadness - Single', 'https://i1.sndcdn.com/artworks-000054294672-n7s35t-t500x500.jpg'),
(3, 'Lost Frequencies Remixes', 'https://i1.sndcdn.com/artworks-000084779311-iq5yom-t500x500.jpg'),
(4, 'Slow Burn - Single', 'https://i1.sndcdn.com/artworks-000090423945-vo94ap-t500x500.jpg'),
(5, 'Technicolour Beat', 'https://i1.sndcdn.com/artworks-000108493426-6rxtyi-t500x500.jpg'),
(6, 'Human', 'https://i1.sndcdn.com/artworks-000094062517-ozt15n-t500x500.jpg'),
(7, 'AQUILO', 'https://i1.sndcdn.com/artworks-000079355075-q9k5vb-t500x500.jpg'),
(8, 'Cheerleader', 'https://i1.sndcdn.com/artworks-000080011906-voy444-t500x500.jpg'),
(9, 'Firestone - Single', 'https://i1.sndcdn.com/artworks-000098808436-c4supd-t500x500.jpg'),
(10, 'Something New (Remixes)', 'https://i1.sndcdn.com/artworks-000100617900-c5frb9-t500x500.jpg'),
(11, 'Sweet Talker', 'https://i1.sndcdn.com/artworks-000093418071-huoqei-t500x500.jpg'),
(12, 'Strange Clouds', 'https://i1.sndcdn.com/artworks-000022342620-wuv5d2-t500x500.jpg'),
(13, 'In A Tidal Wave Of Mystery', 'https://i1.sndcdn.com/artworks-000110028799-z4wj8c-t500x500.jpg'),
(14, 'Overexposed', 'https://i1.sndcdn.com/artworks-000024668442-rgcqo8-t500x500.jpg'),
(15, 'Younger (Remixes)', 'https://i1.sndcdn.com/artworks-000066591433-nesygp-t500x500.jpg'),
(16, 'Bitter', 'https://i1.sndcdn.com/artworks-000109097796-ex5989-t500x500.jpg'),
(17, '+', 'https://i1.sndcdn.com/artworks-000020746262-21zqb6-t500x500.jpg'),
(18, 'You Are My Summer', 'https://i1.sndcdn.com/artworks-000084639924-v99hkf-t500x500.jpg'),
(19, 'White Dress', 'https://i1.sndcdn.com/artworks-000110494015-01e23c-t500x500.jpg'),
(20, 'Dangerous - Single', 'https://i1.sndcdn.com/artworks-000094050155-3f0113-t500x500.jpg'),
(21, 'Ember - Single', 'https://i1.sndcdn.com/artworks-000111325695-9h6xej-t500x500.jpg'),
(22, 'Ocean - Remix', 'https://i1.sndcdn.com/artworks-000092089513-3wbuqh-t500x500.jpg'),
(23, 'Sun Goes Down', 'https://i1.sndcdn.com/artworks-000112117815-0a4elg-t500x500.jpg'),
(24, 'Vacant Space', 'https://i1.sndcdn.com/artworks-000096700207-5l3nrl-t500x500.jpg'),
(25, 'Bang That - Single ', 'https://i1.sndcdn.com/artworks-000115300744-g4maa1-t500x500.jpg'),
(26, 'Settle', 'https://i1.sndcdn.com/avatars-000039477229-dcene8-t500x500.jpg'),
(27, 'Flume (Deluxe Edition)', 'https://i1.sndcdn.com/artworks-000059032205-a7exzl-t500x500.jpg'),
(28, 'The Rhythm', 'https://i1.sndcdn.com/artworks-000111230807-rsyb7a-t500x500.jpg'),
(29, 'Sirens', 'https://i1.sndcdn.com/artworks-000093296496-7bhyef-t500x500.jpg'),
(30, 'Promesses', 'https://i1.sndcdn.com/artworks-000109770864-6u5lfr-t500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `ArtistID` int(3) NOT NULL AUTO_INCREMENT,
  `ArtistName` varchar(60) NOT NULL,
  PRIMARY KEY (`ArtistID`),
  KEY `ArtistID` (`ArtistID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`ArtistID`, `ArtistName`) VALUES
(1, 'Major Lazer'),
(2, 'Lana Del Rey'),
(3, 'Lost Frequencies'),
(4, 'Durante'),
(5, 'Oh Wonder'),
(6, 'Aquilo'),
(7, 'OMI'),
(8, 'Kygo'),
(9, 'Axwell Ingrosso'),
(10, 'B.O.B.'),
(11, 'Jessie J'),
(12, 'Capital Cities'),
(13, 'Maroon 5'),
(14, 'Seinabo Sey'),
(15, 'HUNTAR'),
(16, 'Ed Sheeran'),
(17, 'La+ch'),
(18, 'Set Mo'),
(19, 'David Guetta'),
(20, 'WhoMadeWho'),
(21, 'Andreas Moe'),
(22, 'Robin Schulz'),
(23, 'George Maple'),
(24, 'Disclosure'),
(25, 'Flume'),
(26, 'MNEK'),
(27, 'Gorgon City'),
(28, 'Tchami');

-- --------------------------------------------------------

--
-- Table structure for table `mood`
--

CREATE TABLE IF NOT EXISTS `mood` (
  `MoodID` int(3) NOT NULL AUTO_INCREMENT,
  `Mood` varchar(32) NOT NULL,
  PRIMARY KEY (`MoodID`),
  KEY `MoodID` (`MoodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mood`
--

INSERT INTO `mood` (`MoodID`, `Mood`) VALUES
(1, 'happy'),
(2, 'sad'),
(3, 'relaxed'),
(4, 'energic');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `SongID` int(3) NOT NULL AUTO_INCREMENT,
  `SongName` varchar(100) NOT NULL,
  `ArtistID` int(3) NOT NULL,
  `AlbumID` int(3) NOT NULL,
  `Link` varchar(300) NOT NULL,
  `MoodID` int(3) NOT NULL,
  PRIMARY KEY (`SongID`),
  KEY `SongID` (`SongID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`SongID`, `SongName`, `ArtistID`, `AlbumID`, `Link`, `MoodID`) VALUES
(1, 'Lean On', 1, 1, 'soundcloud.com/majorlazer/major-lazer-dj-snake-lean-on-feat-mo', 1),
(2, 'Summertime Sadness', 2, 2, 'soundcloud.com/cedricgervais/lana-del-rey-remixed-by-cedric-gervais', 4),
(3, 'Are You With Me', 3, 3, 'soundcloud.com/lo-freq-1/are-you-with-me', 3),
(4, 'Slow Burn', 4, 4, 'soundcloud.com/tsyn/durante-slow-burn-original-mix', 3),
(5, 'Technicolour', 5, 5, 'soundcloud.com/ohwondermusic/technicolour-beat', 2),
(6, 'I Gave It All', 6, 6, 'soundcloud.com/aquilo/i-gave-it-all', 2),
(7, 'It All Comes Down to This', 6, 7, 'soundcloud.com/aquilo/it-all-comes-down-to-this', 2),
(8, 'Cheerleader (Felix Jaehn Remix)', 7, 8, 'soundcloud.com/ultrarecords/cheerleader-felixjaehnremix', 1),
(10, 'Firestone', 8, 9, 'soundcloud.com/kygo/firestone-ft-conrad', 1),
(11, 'Something New (Robin Schulz Mix)', 9, 10, 'soundcloud.com/axwellingrosso/something-new-robin-schulz-club-mix', 1),
(12, 'Sweet Talker', 11, 11, 'soundcloud.com/isthatjessiiej/03-sweet-talker-03', 1),
(13, 'Bang Bang (feat. Ariana Grande & Nicki Minaj)', 11, 11, 'soundcloud.com/isthatjessiiej/04-bang-bang-ariana-grande-nicki-minaj', 1),
(14, 'Both Of Us (feat. Taylor Swift)', 10, 12, 'soundcloud.com/bobatl/both-of-us-ft-taylor-swift', 1),
(15, 'Safe and Sound', 12, 13, 'soundcloud.com/capital-cities/safe-and-sound-1', 1),
(16, 'Daylight', 13, 14, 'soundcloud.com/maroon-5/daylight', 1),
(17, 'Younger (Kygo Remix)', 14, 15, 'soundcloud.com/kygo/seinabo-sey-younger-kygo-remix', 1),
(19, 'Personal', 11, 11, 'soundcloud.com/isthatjessiiej/06-personal-06', 2),
(20, 'Expectations', 15, 16, 'soundcloud.com/huntarmusic/expectations', 2),
(21, 'Give Me Love', 16, 17, 'soundcloud.com/edsheeran/ed-sheeran-give-me-love', 2),
(22, 'U.N.I.', 16, 17, 'soundcloud.com/edsheeran/ed-sheeran-u-n-i', 2),
(23, 'You Are My Summer (Feat. Coleman Hell & Jayme)', 17, 18, 'soundcloud.com/la-ch/lach-you-are-my-summer-feat-coleman-hell-jayme', 3),
(24, 'White Dress (ft. Deutsch Duke)', 18, 19, 'soundcloud.com/setmomusic/set-mo-white-dress-ft-deutsch-duke', 3),
(25, 'No Trust (feat. Lauren)', 3, 3, 'soundcloud.com/lo-freq-1/no-trust-feat-lauren', 3),
(26, 'Tell Me', 3, 3, 'soundcloud.com/lo-freq-1/tell-me-original-mix', 3),
(29, 'Dangerous (Feat. Sam Martin - Robin Schulz Remix)', 19, 20, 'soundcloud.com/davidguetta/david-guetta-ft-sam-martin-dangerous-robin-schulz-remix-radio-edit', 3),
(30, 'Ember', 20, 21, 'soundcloud.com/whomadewho/whomadewho-ember-radio-edit', 2),
(31, 'Ocean (LCAW Remix)', 21, 22, 'soundcloud.com/l-c-a-w/andreas-moe-ocean', 3),
(32, 'As The Sun Goes Down (LOST Edit)', 22, 23, 'soundcloud.com/l0st-official/as-the-sun-goes-down-robin-schulz-tetreault-edit', 3),
(33, 'Vacant Space', 23, 24, 'soundcloud.com/george-maple/vacant-space', 3),
(34, 'Bang That', 24, 25, 'soundcloud.com/disclosuremusic/bang-that', 4),
(35, 'Latch (feat. Sam Smith)', 24, 26, 'soundcloud.com/disclosuremusic/latch-ft-sam-smith', 4),
(36, 'Holdin On (Feat. Freddie Gibbs)', 25, 27, 'soundcloud.com/flume/flume-holdin-on-feat-freddie', 4),
(37, 'The Rhythm', 26, 28, 'soundcloud.com/mnek-1/the-rhythm', 4),
(38, 'Lover Like You', 27, 29, 'soundcloud.com/gorgon-city/lover-like-you-ft-katy-b', 4),
(39, 'Promesses', 28, 30, 'soundcloud.com/iamtchami/tchami-promesses-feat-kaleem', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(3) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Email` varchar(1024) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Name`, `Email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alexandra', ''),
(2, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 'User', 'user@test.com'),
(6, 'andyelement', '507950f1fc41318daac7f354f4a50d75', 'Andy', 'andyboscor@yahoo.com'),
(8, 'aalex', '5f4dcc3b5aa765d61d8327deb882cf99', 'alex', 'alexandra.stoica95@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `usersongs`
--

CREATE TABLE IF NOT EXISTS `usersongs` (
  `LinkID` int(3) NOT NULL AUTO_INCREMENT,
  `UserID` int(3) NOT NULL,
  `SongID` int(3) NOT NULL,
  PRIMARY KEY (`LinkID`),
  KEY `UserID` (`UserID`),
  KEY `SongID` (`SongID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `usersongs`
--

INSERT INTO `usersongs` (`LinkID`, `UserID`, `SongID`) VALUES
(23, 2, 4),
(24, 2, 1),
(27, 1, 4),
(28, 1, 1),
(29, 1, 6),
(31, 1, 13),
(34, 1, 19),
(38, 6, 1),
(39, 1, 35);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
