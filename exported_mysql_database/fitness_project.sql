-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 08. Apr 2021 um 19:00
-- Server-Version: 5.7.24
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fitness_site`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `exer_picture` text NOT NULL,
  `exer_name` varchar(255) NOT NULL,
  `exer_description` text NOT NULL,
  `exer_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `exercise`
--

INSERT INTO `exercise` (`id`, `exer_picture`, `exer_name`, `exer_description`, `exer_category`) VALUES
(1, 'crunch.jpg', 'Crunch', 'Lie down on your back. Plant your feet on the floor, hip-width apart. Bend your knees and place your arms behind your head. Contract your abs and lift your upper body while you exhale, keeping your head and neck relaxed.\r\nInhale and return to the starting position.', 'Abdomen'),
(2, 'reversecrunch.jpg', 'Reverse Crunch', 'Raise your legs so your thighs are perpendicular to the floor and your knees are bent at a 90° angle. Breathe out and contract your abs to bring your knees up towards your chest and raise your hips off the floor. Hold for a beat in this position, then slowly lower your legs back to the starting position.', 'Abdomen'),
(3, 'russiantwist.jpg', 'Russian Twist', 'Sit with bent knees and your feet pressing firmly into the floor, holding a dumbbell next to your chest. Sit back slightly, keeping your spine straight. Exhale as you twist to the left, holding the weight. Inhale back to center, and then do the opposite side.', 'Abdomen'),
(4, 'plank.jpg', 'Plank', 'Lay on the floor with your elbows under your shoulders, hands flat on the floor and core engaged.\r\nKeeping your forearms and knees on the floor, slowly raise yourself upwards until your body is in a straight line from your knees to your head. Hold the position for as long as you can.', 'Abdomen'),
(5, 'superman.jpg', 'Superman', 'Lie facedown on the floor with your arms extended in front of you and your legs extended behind you. In one movement, engage your glutes and lower back to raise your arms, legs, and chest off the floor. Hold for a count, then slowly return to the starting position.', 'Abdomen'),
(6, 'bicepscurl.jpg', 'Biceps Curls', 'Start standing with a dumbbell in each hand. Your elbows should rest at your sides and your forearms should extend out in front of your body.Bring the dumbbells all the way up to your shoulders by bending your elbows. Once at the top, hold for a second by squeezing the muscle. Reverse the curl slowly and repeat.', 'Arms'),
(7, 'wallpushup.jpg', 'Wall Push Up', 'Assume the starting position with feet and legs together, standing about 2 feet from a wall with your arms straight out in front of you. Bend your elbows and begin to lean your body toward the wall until your nose almost touches it.  Push back to the starting position and repeat.', 'Arms'),
(8, 'tricepsdips.jpg', 'Triceps Dips', 'Grip the front edges of a chair or bench with your hands. Hover your butt just off and in front of the seat, feet flat, and legs bent so thighs are parallel to the floor. Straighten your arms. Lower your body toward the floor until your arms form 90° angles. Then, engage your triceps to press back to start.', 'Arms'),
(9, 'armcircles.jpg', 'Arm Circles', 'Stand with your feet shoulder-width apart and extend your arms parallel to the floor. Circle your arms forward using small controlled motions, gradually making the circles bigger until you feel a stretch in your triceps. Reverse the direction of the circles after about 10 seconds.', 'Arms'),
(10, 'squat.jpg', 'Squat', 'Stand straight with feet hip-width apart. Tighten your stomach muscles.Lower down, as if sitting in an invisible chair. Straighten your legs to lift back up. Repeat the movement.', 'Glutes'),
(11, 'glutebridge.jpg', 'Glute Bridge', 'Lie face up on the floor, with your knees bent and feet flat on the ground. Keep your arms at your side with your palms down. Lift your hips off the ground until your knees, hips and shoulders form a straight line. Squeeze those glutes hard and keep your abs drawn in so you don’t overextend your back during the exercise. Hold your bridged position for a couple of seconds before easing back down.', 'Glutes'),
(12, 'singlelegglutebridge.jpg', 'Single Leg Glute Bridge', 'Lie on your back and bend your knees so your feet rest flat on the floor. Then raise one leg until it is stretched out straight. Brace yourself, then drive the heel of the foot still grounded into the floor and push your hips up until your body is in a straight line from your shoulders to the toes of your outstretched foot. Slowly lower yourself again, then repeat on the same side.', 'Glutes'),
(13, 'bulgariansplit.jpg', 'Bulgarian Split Squat', 'Stand 2 to 3 feet in front of a knee-high platform. Extend your right leg behind you and rest your toes on the bench or chair. Keeping your torso upright, slowly lower your right knee toward the floor. Reverse the move and return to the starting position.', 'Glutes'),
(14, 'firehydrant.jpg', 'Fire Hydrant', 'Start on your hands and knees. Place your shoulders above your hands and your hips above your knees. Lift your left leg away from your body at a 45-degree angle. Keep your knee at 90 degrees. Lower your leg to starting position to complete 1 rep. Do 3 sets of 10 reps. Repeat with the other leg.', 'Glutes'),
(15, 'clam.jpg', 'Clam', 'Lying on your side with hips and knees bent and knees together, raise your top knee toward the ceiling, keeping your feet together. Hold, then slowly lower your knee. Repeat several times on both sides.', 'Glutes'),
(16, 'calfraise.jpg', 'Calf Raise', 'Stand up straight, then push through the balls of your feet and raise your heel until you are standing on your toes. Then lower slowly back to the start.', 'Legs'),
(17, 'wallsit.jpg', 'Wall Sit', 'Make sure your back is flat against the wall.\r\nPlace your feet firmly on the ground, shoulder-width apart, and then about 2 feet out from the wall. Slide your back down the wall while keeping your core engaged and bending your legs until they’re in a 90° angle. Your knees should be directly above your ankles, not jutting out in front of them. Hold your position, while contracting your ab muscles.', 'Legs'),
(18, 'gobletsquat.jpg', 'Goblet Squat', 'Stand with your feet slightly wider than hip-distance apart, your toes angled slightly outward. Hold a kettlebell in both hands at your chest. Engage your core and look straight ahead. You want to keep your back neutrally aligned. Press your hips back and begin bending your knees to perform the squat. Press through your heels and reverse the motion to return to the starting position.', 'Legs'),
(19, 'stepup.jpg', 'Step Up', 'To start, place your entire right foot onto the bench or chair. Press through your right heel as you step onto the bench, bringing your left foot to meet your left so you are standing on the bench. Return to the starting position by stepping down with the right foot, then the left so both feet are on the floor. Complete 15 steps leading with the left foot, then repeat another 15 steps leading with your left foot. Do three sets.', 'Legs'),
(20, 'lunge.jpg', 'Lunges', 'Start by standing up tall. Step forward with one foot until your leg reaches a 90° angle. Lift your front lunging leg to return to the starting position. Repeat 10 to 12 reps on one leg, or switch off between legs until you have totaled 10 to 12 reps per leg.', 'Legs'),
(21, 'downdog.jpg', 'Down Dog', 'Your hands should be shoulder-width apart and spread your fingers out wide. Press your hands into the mat and gently tuck your toes under and take a deep inhale, then keeping your hands pressed into the mat exhale deeply, lifting your knees off the floor and straightening your legs as much as you can.', 'Yoga'),
(22, 'treepose.jpg', 'Tree Pose', 'Start by standing straight with a long, tall back and your feet aligned and touching. Take a few breaths and find a place or object in the room to focus your attention. Stretch your arms straight up toward the ceiling with palms pressed together forming an inverted V.', 'Yoga'),
(23, 'childpose.jpg', 'Child Pose', 'Kneel on the floor with your toes together and your knees hip-width apart. Rest your palms on top of your thighs. On an exhale, lower your torso between your knees. Extend your arms alongside your torso with your palms facing down. Relax your shoulders toward the ground. Rest in the pose for as long as needed.', 'Yoga'),
(24, 'kobrapose.jpg', 'Cobra Pose', 'For Cobra Pose, lie down on your abdomen and point your feet behind you. Place your hands palms down on the ground beneath your shoulders. Lift your chest up off the ground by straightening your arms. Gaze upwards and keep your abdominals engaged. ', 'Yoga'),
(25, 'warrior2.jpg', 'Warrior 2 Pose', 'Stand in a wide position with your feet parallel and approximately three feet apart. Extend your arms straight out from your sides. Relax your shoulders away from your ears. Turn your left foot out 90 degrees, then bend your knee into a lunge. Be sure to keep your knee above your ankle and pointing over your toes.', 'Yoga');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `gender`, `username`, `mail`, `password`) VALUES
(1, 'other', 'testUser', 'test@test.ch', '$2y$10$.BEI2ZObJfGKN.j19Rx.0.ffaiTAdkB4S7Bp0SrA.aE3vvZs7iL.2');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
