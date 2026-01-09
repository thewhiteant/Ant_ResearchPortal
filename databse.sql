
-- --------------------------------------------------------
-- Table structure for table `auth`
-- Stores user credentials and profile info
-- --------------------------------------------------------
CREATE TABLE `auth` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL, -- Stores sha256 hash of username
  `password` varchar(255) NOT NULL, -- Stores sha256 hash of password
  `nname` varchar(100) NOT NULL,    -- Display name (e.g., @John)
  `color` varchar(7) DEFAULT '#000000', -- Hex color for UI elements
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Table structure for table `documets`
-- Stores uploaded research paper metadata
-- --------------------------------------------------------
CREATE TABLE `documets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,      -- Filename
  `des` text DEFAULT NULL,           -- Description
  `userid` int(11) NOT NULL,         -- Links to auth.uid
  `utime` date NOT NULL,             -- Upload date
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_doc_user` FOREIGN KEY (`userid`) REFERENCES `auth` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Table structure for table `notes`
-- Stores user-specific notes
-- --------------------------------------------------------
CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `uid` int(11) NOT NULL,            -- Links to auth.uid
  PRIMARY KEY (`note_id`),
  CONSTRAINT `fk_note_user` FOREIGN KEY (`uid`) REFERENCES `auth` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Dummy Data for Testing (Password is 'admin' hashed in SHA256)
-- --------------------------------------------------------
INSERT INTO `auth` (`username`, `password`, `nname`, `color`) VALUES
('8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 
 '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 
 'AdminUser', '#EF5A6F');