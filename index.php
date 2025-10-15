<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Coração 3D com Babylon.js</title>
  <script src="https://cdn.babylonjs.com/babylon.js"></script>
  <style>
    html, body { margin: 0; padding: 0; overflow: hidden; }
    #formulario { position: absolute; z-index: 10; background: rgba(255,255,255,0.9); padding: 10px; }
    canvas { width: 100%; height: 100%; display: block; }
  </style>
</head>
<body>
  <div id="formulario">
    <label>Sequência (0 a 6):</label><br>
    <input type="text" id="sequencia" value="50305040601060102"><br>
    <label>Dimensões (cm, separadas por vírgula):</label><br>
    <input type="text" id="dimensoes" value="8,0,6,0,8,0,6,0,10,0,5,0,10,0,5"><br>
    <button onclick="desenhar()">Desenhar</button>
  </div>

  <canvas id="renderCanvas"></canvas>

  <script>
    const canvas = document.getElementById("renderCanvas");
    const engine = new BABYLON.Engine(canvas, true);
    let scene;

    function desenhar() {
      scene = new BABYLON.Scene(engine);
      const camera = new BABYLON.ArcRotateCamera("camera", Math.PI / 2, Math.PI / 2.5, 100, BABYLON.Vector3.Zero(), scene);
      camera.attachControl(canvas, true);
      new BABYLON.HemisphericLight("light", new BABYLON.Vector3(0, 1, 0), scene);

      const seq = document.getElementById("sequencia").value.trim();
      const dims = document.getElementById("dimensoes").value.trim().split(",").map(s => parseFloat(s.trim()));

      const direcoes = {
        '0': [0, 0, 0],
        '1': [0, 0, 1],
        '2': [0, 0, -1],
        '3': [-1, 0, 0],
        '4': [1, 0, 0],
        '5': [0, 1, 0],
        '6': [0, -1, 0]
      };

      let pontos = [];
      let x = 0, y = 0, z = 0;
      pontos.push(new BABYLON.Vector3(x, y, z));

      for (let i = 0; i < seq.length; i++) {
        const dir = seq[i];
        const dist = dims[i] || 0;
        const delta = direcoes[dir];
        if (!delta) continue;
        x += delta[0] * dist;
        y += delta[1] * dist;
        z += delta[2] * dist;
        pontos.push(new BABYLON.Vector3(x, y, z));
      }

      const linha = BABYLON.MeshBuilder.CreateLines("linha", { points: pontos }, scene);
      linha.color = BABYLON.Color3.Red();

      pontos.forEach(p => {
        const esfera = BABYLON.MeshBuilder.CreateSphere("ponto", { diameter: 1.5 }, scene);
        esfera.position = p;
        esfera.material = new BABYLON.StandardMaterial("mat", scene);
        esfera.material.diffuseColor = BABYLON.Color3.Blue();
      });
    }

    desenhar();
    engine.runRenderLoop(() => scene && scene.render());
    window.addEventListener("resize", () => engine.resize());
  </script>
</body>
</html>


[22:34, 14/10/2025] Carlito Pautz: 5033366454444546633305
[22:34, 14/10/2025] Carlito Pautz: 10,0,10,10,10,10,10,10,10,10,10,10,0,10,10,10,10,10,10,10,10,10
