<?php
require __DIR__ . '/vendor/autoload.php';
$Parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD to HTML</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <script src="./node_modules/monaco-editor/min/vs/loader.js"></script>
        <script src="js/app.js"></script>
</head>
<body>

    <div class="d-flex justify-content-between align-items-center px-4">
        <div class="d-flex justify-content-between align-items-center px-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadio" id="HTMLRadio">
              <label class="form-check-label" for="HTMLRadio">
                HTML
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadio" id="PreviewRadio" checked>
              <label class="form-check-label" for="PreviewRadio">
                Preview
              </label>
            </div>

            <button id="render" type="button" class="btn btn-primary m-4" onclick="renderContent()">RENDER</button>
        </div>
        <div>
            <a id="download" type="button" class="text-decoration-none m-4" onclick="downloadContent()" download="download.html">
                download
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-center align-content-center m-3">

        <div id="editor-container" class="m-4 w-50" style="height:80vh;border:1px solid grey"></div>


        <div id="converted-container" class="m-4 w-50 overflow-auto" style="height:80vh;border:1px solid grey">

        <?php
            echo $Parsedown->text("# Markdown Cheat Sheet\n" .
            "Thanks for visiting [The Markdown Guide](https://www.markdownguide.org)!\n" .
            "This Markdown cheat sheet provides a quick overview of all the Markdown syntax elements. It can’t cover every edge case, so if you need more information about any of these elements, refer to the reference guides for [basic syntax](https://www.markdownguide.org/basic-syntax/) and [extended syntax](https://www.markdownguide.org/extended-syntax/).\n" .
            "\n" .
            "## Basic Syntax\n" .
            "These are the elements outlined in John Gruber’s original design document. All Markdown applications support these elements.\n" .
            "\n" .
            "### Heading\n" .
            "# H1\n" .
            "## H2\n" .
            "### H3\n" .
            "\n" .
            "### Bold\n" .
            "**bold text**\n" .
            "\n" .
            "### Italic\n" .
            "*italicized text*\n" .
            "\n" .
            "### Blockquote\n" .
            "> blockquote\n" .
            "\n" .
            "### Ordered List\n" .
            "1. First item\n" .
            "2. Second item\n" .
            "3. Third item\n" .
            "\n" .
            "### Unordered List\n" .
            "- First item\n" .
            "- Second item\n" .
            "- Third item\n" .
            "\n" .
            "### Code\n" .
            "`code`\n" .
            "\n" .
            "### Horizontal Rule\n" .
            "---\n" .
            "\n" .
            "### Link\n" .
            "[Markdown Guide](https://www.markdownguide.org)\n" .
            "\n" .
            "### Image\n" .
            "![alt text](https://www.markdownguide.org/assets/images/tux.png)\n" .
            "\n" .
            "## Extended Syntax\n" .
            "These elements extend the basic syntax by adding additional features. Not all Markdown applications support these elements.\n" .
            "\n" .
            "### Table\n" .
            "| Syntax | Description |\n" .
            "| ----------- | ----------- |\n" .
            "| Header | Title |\n" .
            "| Paragraph | Text |\n" .
            "\n" .
            "### Fenced Code Block\n" .
            "```\n" .
            "{\n" .
            '  "firstName": "John",\n' .
            '  "lastName": "Smith",\n' .
            '  "age": 25\n' .
            "}\n" .
            "```\n" .
            "\n" .
            "### Footnote\n" .
            "Here's a sentence with a footnote. [^1]\n" .
            "[^1]: This is the footnote.\n" .
            "\n" .
            "### Heading ID\n" .
            "### My Great Heading {#custom-id}\n" .
            "\n" .
            "### Definition List\n" .
            "term\n" .
            ": definition\n" .
            "\n" .
            "### Strikethrough\n" .
            "~~The world is flat.~~\n" .
            "\n" .
            "### Task List\n" .
            "- [x] Write the press release\n" .
            "- [ ] Update the website\n" .
            "- [ ] Contact the media\n" .
            "\n" .
            "### Emoji\n" .
            "That is so funny! :joy:\n" .
            "(See also [Copying and Pasting Emoji](https://www.markdownguide.org/extended-syntax/#copying-and-pasting-emoji))\n" .
            "\n" .
            "### Highlight\n" .
            "I need to highlight these ==very important words==.\n" .
            "\n" .
            "### Subscript\n" .
            "H~2~O\n" .
            "\n" .
            "### Superscript\n" .
            "X^2^")
            ;?>

        </div>
    </div>
</body>
</html>
