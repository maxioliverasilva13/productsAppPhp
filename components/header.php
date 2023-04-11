<?php 
    
?>

<header class="w-full h-[60px] bg-gray-700 px-4 flex flex-row items-center justify-between shadow-md">
    <p class="text-white font-semibold text-[20px]">Smart<span class="text-white bg-blue-700 text-[22px] font-bold px-2 py-1 rounded-lg ml-1">Buy</span></p>

    <div class="w-auto h-full flex flex-row items-center justify-start relative">
        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2960&q=80"
            class="w-[30px] h-[30px] max-w-[30px] max-h-[30px] object-cover rounded-full"
        />
        <span class="text-white font-medium font-sans ml-2 relative">
            Maximiliano O.
            <i onclick="toggleDirection()" id="iconDown" class="ml-2 cursor-pointer fa-sharp fa-solid fa-chevron-down transition-all"></i>
       
        <div id="userPopOver" class="absolute bg-white transition-all gap-y-[1px] w-[160px] px-2 py-2 h-auto rounded-lg shadow-md top-full right-0 hidden flex-col items-start justify-start">
            <a class="text-gray-900 text-[14px] px-2 py-1 rounded-md hover:bg-gray-200 w-full transition-all cursor-pointer">Account Details</a>
            <a href="logout.php" class="text-gray-900 text-[14px] px-2 py-1 rounded-md hover:bg-gray-200 w-full transition-all cursor-pointer">Logout</a>
        </div>
        </span>
    </div>
</header>

<script>

    const toggleDirection = () => { 
        const icon = document.getElementById("iconDown");
        const isOpen = icon.className.includes("transform rotate-180")
        const popOver =document.getElementById("userPopOver");
        if (!isOpen) {
            icon.className = icon.className + " transform rotate-180"
            popOver.className = popOver.className.replace("hidden", "flex")
        } else {
            icon.className = icon.className.replace("transform rotate-180", "")
            popOver.className = popOver.className.replace("flex", "hidden")
        }
    }

</script>