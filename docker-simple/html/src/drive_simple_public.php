<?php 
		session_start();
		$userSaisie = $_SESSION['username'];

		$dbuser = 'review_site';
		$dbpass = 'password';
		$conn = new mysqli("localhost", $dbuser, $dbpass, "momentos");
		$conn->set_charset("utf8");

		if ($conn->connect_error) 
			echo "erreurrrrrrrrrrrrrrr";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="../dist/output.css">
		<title>Mon drive</title>
		<link rel="icon" type="image/x-icon" href="./img/favicon.png">
	</head>



	<body class="bg-slate-100">
		<nav class="bg-white border-b shadow-sm border-slate-300">
			<div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
				<div class="relative flex items-center justify-between h-16">
					<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
						<!-- Mobile menu button-->
						<button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
							<span class="sr-only">Open main menu</span>
							<!--
							Icon when menu is closed.
				
							Menu open: "hidden", Menu closed: "block"
							-->
							<svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
							<!--
							Icon when menu is open.
				
							Menu open: "block", Menu closed: "hidden"
							-->
							<svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
						<div class="flex items-center flex-shrink-0">
							<img class="block w-auto h-8 lg:hidden" src="./img/favicon_black.png" alt="Logo 'Momentos'">
							<img class="hidden w-auto h-8 lg:block" src="./img/favicon_black.png" alt="Logo 'Momentos'">
						</div>
						<div class="hidden sm:ml-6 sm:block">
							<div class="flex ml-8 space-x-4">
								<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
								<a href="./drive_simple.php" class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">Espace personnel</a>
								<a href="#" class="h-full px-3 py-2 text-sm font-medium text-white bg-indigo-600 border-b-2 rounded-md" aria-current="page">Espace public</a>
							</div>
						</div>
					</div>
					<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
			
						<!-- Profil -->
						<div>
							<div>
							<a href="./login.html">
									<button type="button" class="flex space-x-2 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
										<p class="mt-[5px] text-sm"><?php echo $userSaisie ?></p>
										<img class="w-8 h-8 rounded-full" src="./img/default_icon.png" alt="">
									</button>
								</a>
							</div>
				
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="px-2 mx-auto mt-12 max-w-7xl sm:px-6 lg:px-8">
			<section id="drive" class="">
				<!-- Header -->
				<div class="flex justify-between">
					<div class="md:flex md:space-x-4">
						<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Espace Publique</h2>
						<p class="text-sm text-gray-500 md:relative -bottom-3">Toutes les vidéos enregistrés par les personnes de la communauté</p>
					</div>
				</div>

				<!-- Drive grid -->
				<div class="grid grid-cols-1 mt-8 gap-x-6 gap-y-12 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">

					<?php
						$sql = "SELECT * FROM VIDEOS WHERE bpublic = true;";

						$result = $conn->query($sql);
						if ($result->num_rows > 0)
						{
							while ($row = $result->fetch_assoc()) 
							{
								echo '
								<div class="group">
									<div class="w-full overflow-hidden bg-gray-900 rounded-lg aspect-h-1 aspect-w-1 xl:aspect-h-8 xl:aspect-w-7">
										<a href="'. $row["lien"]. '">
											<img src="http://img.youtube.com/vi/' .substr($row["lien"],32). '/mqdefault.jpg" class="object-cover object-center w-full h-full group-hover:opacity-90">
										</a>
									</div>
			
									<div class="flex justify-between pt-1.5 space-x-4 align-middle">
										<a href="'. $row["lien"]. '">
											<h3 class="pr-6 text-sm text-gray-700 group-hover:text-gray-900">' .$row["nom"] . '</h3>
										</a>
			
										<div class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-600 rounded-md md:my-auto h-fit w-fit bg-gray-50 ring-1 ring-inset ring-gray-500/10">Public</div>
									</div>
								</div>
								';
							}
						}
					?>



				</div>
				
			</section>
		</div>
		
		

	</body>
</html>