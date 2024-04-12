(function() {
	
	// Get a regular interval for drawing to the screen
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame || 
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimaitonFrame ||
					function (callback) {
					 	window.setTimeout(callback, 1000/60);
					};
	})();

	// Set up the canvas
	var canvas = document.getElementById("sig-canvasArb");
	var ctx = canvas.getContext("2d");
	ctx.strokeStyle = "#222222";
	ctx.lineWith = 2;

	// Set up the UI
	var sigText = document.getElementById("sig-dataUrlArb");
	var sigImage = document.getElementById("sig-imageArb");
	var clearBtn = document.getElementById("sig-clearBtnArb");
	var submitBtn = document.getElementById("sig-submitBtnArb");

	$("#sig-clearBtnArb").click(function() {
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            ctx.beginPath();
	});
	submitBtn.addEventListener("click", function (e) {
		var dataUrl = canvas.toDataURL();
		sigText.innerHTML = dataUrl;
		sigImage.setAttribute("src", dataUrl);
				
		var img_data = dataUrl.split(",");
		let name_img = img_data[1];
		let assinatura = "ass1Arb";

		console.log(assinatura);
		$.ajax({
			url: 'salvaAssinatura.php',
			data: { name_img:name_img, assinatura:assinatura },
			type: 'post',
			dataType: 'json',
		});
	}, false);

	// Set up mouse events for drawing
	var drawing = false;
	var mousePos = { x:0, y:0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		drawing = true;
		lastPos = getMousePos(canvas, e);
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
	}, false);

	// Set up touch events for mobile, etc
	canvas.addEventListener("touchstart", function (e) {
		mousePos = getTouchPos(canvas, e);
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchend", function (e) {
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
	}, false);

	  document.querySelectorAll("#sig-canvasArb").forEach(canvas => {
		canvas.addEventListener('touchstart', ()=> document.body.style.overflow = 'hidden')
		canvas.addEventListener('touchmove', ()=> document.body.style.overflow = 'hidden')
		canvas.addEventListener('touchend', ()=> document.body.style.overflow = null)
	  });

	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect.left,
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			ctx.stroke();
			lastPos = mousePos;
		}
	}

	// function clearCanvas() {
	// 	canvas.width = canvas.width;
	// }

	// Allow for animation
	(function drawLoop () {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();

        const areaAssinatura = document.getElementById("canvasDivArb");
        const botaoApagar = document.getElementById("sig-clearBtnArb");
        const botaoSalvar = document.getElementById("sig-submitBtnArb");
        const urlImagem = document.getElementById("sig-dataUrlArb");
		const divImage = document.getElementById("sig-imageArb");

        botaoSalvar.onclick = function () {
            if (areaAssinatura.style.display !== "none") {
              areaAssinatura.style.display = "none";
            } else {
              areaAssinatura.style.display = "block";
            }

            if (botaoApagar.style.display !== "none") {
                botaoApagar.style.display = "none";
            } else {
            botaoApagar.style.display = "block";
            } 

            if (botaoSalvar.style.display !== "none") {
                botaoSalvar.style.display = "none";
            } else {
            botaoSalvar.style.display = "block";
            } 

            if (urlImagem.style.display !== "none") {
                urlImagem.style.display = "none";
            } else {
            urlImagem.style.display = "block";
            } 

			if (divImage.style.display !== "block") {
                divImage.style.display = "block";
            } else {
            divImage.style.display = "none";
            } 
          };
})();
