<?php
	require 'connexion.php'; 	
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <nav class="bg-red-700">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-12 w-auto" src="./skull.webp" alt="PERSONNEL">
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <a href="index.php" class="text-gray-300 hover:bg-red-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">HOME</a>
              <a href="ajoutMembre.php" class="text-gray-300 hover:bg-red-900 hover:text-white rounded-md px-3 py-2 text-sm font-medium">AJOUTER</a>
             </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <a href="index.php" class="text-gray-300 hover:bg-red-900 hover:text-white block rounded-md px-3 py-2 text-base font-medium">HOME</a>
        <a href="ajoutMembre.php" class="text-gray-300 hover:bg-red-900 hover:text-white block rounded-md px-3 py-2 text-base font-medium">AJOUTER</a>
      </div>
    </div>
  </nav>
  
  <section class="equipe">
        <div class="bg-gray-100 py-10">

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="ajoutEquipe.php"><button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter une Equipe</button></a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date de Creation</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Modifier</span>
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM equipe";
                                            $result = mysqli_query($connexion, $sql);
                                              while ($row = mysqli_fetch_assoc($result))
                                              {
                                            ?>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                <?php
                                                echo $row['ID_equipe'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['nom_equipe'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['date_creation_eq'];
                                                ?>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                <form action="./modifierEquipe.php" method="get">
                                                  <input type="hidden" name="modifierID" value="<?php echo $row['ID_equipe'] ?>">
                                                  <button type="submit" class="text-indigo-600 hover:text-indigo-900">Modifier<span class="sr-only"></span></button>
                                                </form>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                <a href="supprimerEquipe.php?supprimerID=<?php echo $row['ID_equipe'] ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                            </td>
                                         </tr>
                                         <?php
                                          }

                                          // Free result set
                                          mysqli_free_result($result);
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>

  <section class="membre">
        <div class="bg-gray-100 py-10">

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="ajoutMembre.php"><button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-700 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter un membre</button></a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Prenom Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Email Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Phone number</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Role</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">ID d'equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Modifier</span>
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <?php
                                            $sql = "SELECT * FROM membre";
                                            $result = mysqli_query($connexion, $sql);
                                              while ($row = mysqli_fetch_assoc($result))
                                              {
                                            ?>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                <?php
                                                echo $row['ID_membre'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['NOM_membre'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['prenom_membre'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['email_membre'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['phone_number'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['role'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['status'];
                                                ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                <?php
                                                echo $row['ID_eq'];
                                                ?>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                <form action="./modifierMembre.php" method="get">
                                                  <input type="hidden" name="modifierID" value="<?php echo $row['ID_membre'] ?>">
                                                  <button type="submit" class="text-indigo-600 hover:text-indigo-900">Modifier<span class="sr-only"></span></button>
                                                </form>
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                <a href="supprimerMembre.php?supprimerID=<?php echo $row['ID_membre'] ?>" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                            </td>
                                         </tr>
                                         <?php
                                          }

                                          // Free result set
                                          mysqli_free_result($result);
                                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>

  <section class="all">
        <div class="bg-gray-100 py-10">

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle">
                            <div class="overflow-hidden shadow-sm ring-1 ring-black ring-opacity-5">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6 lg:pl-8">Id Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Prenom Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Email Membre</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Phone number</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Role</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Status</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">ID d'equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Nom Equipe</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Date de Creation</th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Modifier</span>
                                            </th>
                                            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                <span>Supprimer</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <?php
                                            $sql = "SELECT *
                                            FROM `equipe`
                                            JOIN `membre` ON `equipe`.`ID_equipe` = `membre`.`ID_eq`";
                                            $result = mysqli_query($connexion, $sql);
                                              while ($row = mysqli_fetch_assoc($result))
                                              {
                                            ?>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6 lg:pl-8">
                                                        <?php
                                                        echo $row['ID_membre'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['NOM_membre'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['prenom_membre'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['email_membre'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['phone_number'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['role'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['status'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['ID_eq'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['nom_equipe'];
                                                        ?>
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                                                        <?php
                                                        echo $row['date_creation_eq'];
                                                        ?>
                                                    </td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Modifier<span class="sr-only"></span></a>
                                                    </td>
                                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6 lg:pr-8">
                                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Supprimer<span class="sr-only"></span></a>
                                                    </td>
                                        </tr>
                                            
                                        <?php
                                        }

                                        // Free result set
                                        mysqli_free_result($result);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>


  </body>
</html>