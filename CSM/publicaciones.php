<?php
 include 'user.php';
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 session_start();
 $actual_tags = retrieveTags();
 $publications = fetchAllPublications();

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

	<style> 
		.tag {
    display: inline-block;
    border-radius: 3px;
    padding: .2em .5em .3em;
    background: var(--tag-bg);
    color: var(--text-color);
    font-weight: 600;
    margin: .25em .1em;
    color: white;
    background-color: #745d80;
    font-size: .75em;
    } 

	</style>
  <title>Document</title>
</head>
<body>
<header class="header">
	<div class="header-content responsive-wrapper">
		<div class="header-logo">
			<a href="#">
				<div>
					<img src="fotos_local/cat.png" style="max-height: 50px; width: auto;"/>
				</div>			
			</a>
		</div>
		<a href="logout.php" class="button">
			<i class="ph-list-bold"></i>
			<span>Log Out</span>
		</a>
	</div>
</header>
<main class="main">
	<div class="responsive-wrapper">
		<div class="main-header">
			<h1>Navigation</h1>
			<div class="search">
        <div class="input-group rounded">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </div>
			</div>
		</div>
		<div class="horizontal-tabs">
			<a href="profile.php">My Profile</a>
			<a href="create_publicacion.php"> Add Publications</a>
			<a href="#">View All Publications</a>
			<a href="#">View Users</a>
		
		</div>
		<div class="content-header">
			<div class="content-header-intro">
				<h2>Filter by Tags</h2>
				<p>Choose user generated tags that apply to your search.</p>
			</div>
			<div class="content-header-actions">
				<div id="tag-container">
					<?php
						// Loop through the tags and render them within the container
					foreach ($actual_tags as $tag) {
						echo '<span class="tag">' . htmlspecialchars($tag['tag_name']) . '</span>';
					}	
					?>
				</div>
				
			</div>
		</div>
		<div class="content">
			<div class="content-panel">
				<div class="vertical-tabs">
					<h4>Filter Results by </h4>
					<a href="#" class="active">Mine</a>
					<a href="#">User</a>
					<a href="#">Type</a>
					<a href="#">Date</a>
				</div>
			</div>
			<div class="content-main">
				<div class="card-grid">
					
					<?php foreach ($publications as $publication):?>
						<article class="card">
							<div class="card-header">
									<div>
										<?php if ($publication['tipo'] == 'texto'): ?>
											<h3><?= $publication['titulo'] ?></h3>
										<?php else: ?>
												<?php
												$filepath = fetchMedia($publication['id']);
												if ($filepath): ?>
														<span><img src="<?= $filepath['file_path'] ?>" alt="Publication Image"></span>
												<?php endif; ?>
												<h3><?= $publication['titulo']; ?></h3>
										<?php endif; ?>
									</div>
									
								</div>
							<div class="card-body">
								<?php
								 $user_id = $publication['id_autor'];
								 $autor = fetchAutor($user_id);
								?>
								<p><?= $publication['contenido'] ?></p>
								<p> Author: <?=$autor['nombre_usuario'] ?></p>

							</div>
							<div class="card-footer" style="display:flex; justify-content: space-around;">
								
							<a href="edit_publication.php?id=<?= $publication['id'] ?>">Edit publication</a>
    					<button class="icon-btn"><i class="far fa-heart"></i></button>
    					<button class="icon-btn"><i class="far fa-envelope"></i></button>
							<button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
				
							</div>
							<div class="card-footer" style="display:flex; justify-content: space-around;">
								<?php
									$tags = fetchTags($publication['id']);
								
									foreach($tags as $tag){
									echo '<span class="tag">' . htmlspecialchars($tag['tag_name']) . '</span>'; 
								}

								?>
              </div>
						</article>		
					<?php endforeach; ?>
					
				</div>
			</div>
		</div>
	</div>
</main>

		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="app.js"></script>

			<script>
			// Function to handle tag click
				const tags = document.querySelectorAll('.tag');

				function handleTagClick(event) {
				const clickedTag = event.target.textContent.trim(); // Get the text content of the clicked tag
				const tagInput = document.getElementById('tag-input'); // Get the input field
	
				// add the nesecarry sql for this
				}

// Attach click event listeners to all tag elements
			tags.forEach(tag => {
				tag.addEventListener('click', handleTagClick);
			});
</script>
</body>
</html>