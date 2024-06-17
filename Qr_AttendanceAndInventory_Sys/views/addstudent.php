<?php
        session_start();

        // if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true")
        // {
        //     header("Location: login.php");
        //     exit;
        // }

        $checkRoute = str_replace('/Qr_Attendance/Qr_AttendanceAndInventory_Sys/', '', $_SERVER["REQUEST_URI"]);
        if($checkRoute === '' || $checkRoute === '/' ){
            header("Location: home");
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="icon" href="assets/img/bulsuhag.png" type="image/x-icon">
        <link rel="shortcut icon" href="assets/img/bulsuhag.png" type="image/x-icon">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="assets/style.css">

    </head>
    <body>

        <?php include "components/topbar.php"; ?>

        <div class="flex justify-center font-poppins h-full w-full pt-[100px] bg-green-50">
            <div class="bg-opacity-75">
                
                <div class="flex justify-end align-center items-center gap-2">
                    <p class="text-lg font-bold text-left text-teal-900">Created: <span class="bg-white px-2 rounded-full">3</span></p>
                    <button type="button" class="text-teal-700 hover:text-white border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Add</button>
                </div>
                
                <form action="" method="POST" class="flex flex-col gap-5" >
                    <!-- The whole card -->
                    <div class=" w-full ">
                        <p class="text-lg font-bold text-left text-teal-900">
                            Student no. 1
                        </p>
                        <div class="w-full relative gap-5 flex bg-white p-7 rounded-lg shadow-md shadow-green-200">
                            <div id="dropArea">
                                <label for="name" class="tracking-wide block text-[11px] text-gray-900 uppercase font-bold">Student Picture</label>
                                <div id="avatar" class="flex items-center justify-center">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center  w-[200px] h-[200px] h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>  
                                            <p class="mb-2 text-[10px] text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-[10px] text-gray-500">SVG, PNG, JPG or GIF</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                            </div>

                            <div id="allinputs">
                                <label for="name" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Student Name</label>
                                <div id="name" class="flex gap-5">
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="fname" id="fname" placeholder="First Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="middlename">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="mname" id="mname" placeholder="Middle Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="lname" id="lname" placeholder="Last Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="suffix">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="suffix" id="suffix" placeholder="Suffix">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                </div>

                                
                                <div id="name" class="flex gap-5">

                                    <div class="w-full">
                                        <label for="idnumber" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">ID Number</label>
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none placeholder:tracking-wide" 
                                        name="idnumber" id="idnumber" placeholder="Id Number">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="section" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Year and Section</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="section">
                                            <option selected>Year&Section</option>
                                            <option value="1a">1A</option>
                                            <option value="2a">2A</option>
                                            <option value="2b">2B</option>
                                            <option value="3a">3A</option>
                                            <option value="4a">4A</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="group" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Group Number</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="group">
                                            <option selected>Group</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                </div>
                            </div>

                            <button type="button" 
                            class=" absolute right-5 bottom-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1M6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z"/></svg>
                            <span class="sr-only">Icon description</span>
                            </button>
                        </div>
                    </div>
                    <!-- End of The whole card -->

                    <!-- The whole card -->
                    <div class=" w-full ">
                        <p class="text-lg font-bold text-left text-teal-900">
                            Student no. 2
                        </p>
                        <div class="w-full relative gap-5 flex bg-white p-7 rounded-lg shadow-md shadow-green-200">
                            <div id="dropArea">
                                <label for="name" class="tracking-wide block text-[11px] text-gray-900 uppercase font-bold">Student Picture</label>
                                <div id="avatar" class="flex items-center justify-center">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center  w-[200px] h-[200px] h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>  
                                            <p class="mb-2 text-[10px] text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-[10px] text-gray-500">SVG, PNG, JPG or GIF</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                            </div>

                            <div id="allinputs">
                                <label for="name" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Student Name</label>
                                <div id="name" class="flex gap-5">
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="fname" id="fname" placeholder="First Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="middlename">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="mname" id="mname" placeholder="Middle Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="lname" id="lname" placeholder="Last Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="suffix">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="suffix" id="suffix" placeholder="Suffix">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                </div>

                                
                                <div id="name" class="flex gap-5">

                                    <div class="w-full">
                                        <label for="idnumber" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">ID Number</label>
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none placeholder:tracking-wide" 
                                        name="idnumber" id="idnumber" placeholder="Id Number">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="section" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Year and Section</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="section">
                                            <option selected>Year&Section</option>
                                            <option value="1a">1A</option>
                                            <option value="2a">2A</option>
                                            <option value="2b">2B</option>
                                            <option value="3a">3A</option>
                                            <option value="4a">4A</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="group" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Group Number</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="group">
                                            <option selected>Group</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                </div>
                            </div>

                            <button type="button" 
                            class=" absolute right-5 bottom-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1M6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z"/></svg>
                            <span class="sr-only">Icon description</span>
                            </button>
                        </div>
                    </div>
                    <!-- End of The whole card -->

                    <!-- The whole card -->
                    <div class=" w-full ">
                        <p class="text-lg font-bold text-left text-teal-900">
                            Student no. 3
                        </p>
                        <div class="w-full relative gap-5 flex bg-white p-7 rounded-lg shadow-md shadow-green-200">
                            <div id="dropArea">
                                <label for="name" class="tracking-wide block text-[11px] text-gray-900 uppercase font-bold">Student Picture</label>
                                <div id="avatar" class="flex items-center justify-center">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center  w-[200px] h-[200px] h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>  
                                            <p class="mb-2 text-[10px] text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-[10px] text-gray-500">SVG, PNG, JPG or GIF</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div> 
                            </div>

                            <div id="allinputs">
                                <label for="name" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Student Name</label>
                                <div id="name" class="flex gap-5">
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="fname" id="fname" placeholder="First Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="middlename">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="mname" id="mname" placeholder="Middle Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="firstname">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="lname" id="lname" placeholder="Last Name">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                    <div id="suffix">
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-0 placeholder:tracking-wide" 
                                        name="suffix" id="suffix" placeholder="Suffix">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>
                                </div>

                                
                                <div id="name" class="flex gap-5">

                                    <div class="w-full">
                                        <label for="idnumber" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">ID Number</label>
                                        <input type="text" class="w-full border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none placeholder:tracking-wide" 
                                        name="idnumber" id="idnumber" placeholder="Id Number">
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="section" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Year and Section</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="section">
                                            <option selected>Year&Section</option>
                                            <option value="1a">1A</option>
                                            <option value="2a">2A</option>
                                            <option value="2b">2B</option>
                                            <option value="3a">3A</option>
                                            <option value="4a">4A</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                    <div class="w-full">
                                        <label for="group" class="tracking-wide block mb-1 text-[11px] text-gray-900 uppercase font-bold">Group Number</label>
                                        <select class="w-full p-[10.5px] px-4 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block  outline-none" 
                                        id="group">
                                            <option selected>Group</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select> 
                                        <p class="opacity-0 mb-0.25 px-2 text-[11px] text-red-600 "><span class="font-medium">Oops!</span> Credential is wrong!</p>
                                    </div>

                                </div>
                            </div>

                            <button type="button" 
                            class=" absolute right-5 bottom-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1M6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z"/></svg>
                            <span class="sr-only">Icon description</span>
                            </button>
                        </div>
                    </div>
                    <!-- End of The whole card -->  

                    <div class="flex justify-end">
                        <button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        Back</button>
                        <button type="button" type="submit" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none shadow-md shadow-green-200">
                        Add Student</button>
                    </div>

                </form>

            </div>
        </div>

    </body>
    </html>