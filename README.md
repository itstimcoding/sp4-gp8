# sp4-gp8
## A website for SP4 minigame showcase and voting functionality

## **(API backend to receive data from Unity game)Secret input for adding new creation**
**Url for it:**
http://localhost/sp4grp8/hidden_creation_input_GPJIm9FcqCeEgpHksxUs3Op.php

Only Homepage is coded to be for both web and mobile because the 
Homepage(leaderboard) will be on the TV onsite updating realtime. 

For mobile, visitors will be using the will both homepage for browsing and the single select page, creation.php for reacting/voting to posts. 

Homepage(onsite TV, mobile)
Creation.php(mobile)

Features:
- Insertion into database (Unity API, *hidden_creation_in...php*)
- Updating record (Visitors Voting/reacting, *creation.php,controller/save_new_creation.php*)
- AJAX realtime leaderboard for onsite leaderboard/ showcase (Visitors Voting/reacting, *top3/recent_fetch_data, head tag in index.php*)
- Listing database data (*same as previous*)
- Responsive (index.php only)
