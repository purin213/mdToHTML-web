require.config({ paths: { 'vs': './node_modules/monaco-editor/min/vs' }});
require(['vs/editor/editor.main'], function() {
    window.editor = monaco.editor.create(document.getElementById('editor-container'), {
        value:
        "# Markdown Cheat Sheet\n" +
        "Thanks for visiting [The Markdown Guide](https://www.markdownguide.org)!\n" +
        "This Markdown cheat sheet provides a quick overview of all the Markdown syntax elements. It can't cover every edge case, so if you need more information about any of these elements, refer to the reference guides for [basic syntax](https://www.markdownguide.org/basic-syntax/) and [extended syntax](https://www.markdownguide.org/extended-syntax/).\n" +
        "\n" +
        "## Basic Syntax\n" +
        "These are the elements outlined in John Gruber's original design document. All Markdown applications support these elements.\n" +
        "\n" +
        "### Heading\n" +
        "# H1\n" +
        "## H2\n" +
        "### H3\n" +
        "\n" +
        "### Bold\n" +
        "**bold text**\n" +
        "\n" +
        "### Italic\n" +
        "*italicized text*\n" +
        "\n" +
        "### Blockquote\n" +
        "> blockquote\n" +
        "\n" +
        "### Ordered List\n" +
        "1. First item\n" +
        "2. Second item\n" +
        "3. Third item\n" +
        "\n" +
        "### Unordered List\n" +
        "- First item\n" +
        "- Second item\n" +
        "- Third item\n" +
        "\n" +
        "### Code\n" +
        "`code`\n" +
        "\n" +
        "### Horizontal Rule\n" +
        "---\n" +
        "\n" +
        "### Link\n" +
        "[Markdown Guide](https://www.markdownguide.org)\n" +
        "\n" +
        "### Image\n" +
        "![alt text](https://www.markdownguide.org/assets/images/tux.png)\n" +
        "\n" +
        "## Extended Syntax\n" +
        "These elements extend the basic syntax by adding additional features. Not all Markdown applications support these elements.\n" +
        "\n" +
        "### Table\n" +
        "| Syntax | Description |\n" +
        "| ----------- | ----------- |\n" +
        "| Header | Title |\n" +
        "| Paragraph | Text |\n" +
        "\n" +
        "### Fenced Code Block\n" +
        "```\n" +
        "{\n" +
        '  "firstName": "John",\n' +
        '  "lastName": "Smith",\n' +
        '  "age": 25\n' +
        "}\n" +
        "```\n" +
        "\n" +
        "### Footnote\n" +
        "Here's a sentence with a footnote. [^1]\n" +
        "[^1]: This is the footnote.\n" +
        "\n" +
        "### Heading ID\n" +
        "### My Great Heading {#custom-id}\n" +
        "\n" +
        "### Definition List\n" +
        "term\n" +
        ": definition\n" +
        "\n" +
        "### Strikethrough\n" +
        "~~The world is flat.~~\n" +
        "\n" +
        "### Task List\n" +
        "- [x] Write the press release\n" +
        "- [ ] Update the website\n" +
        "- [ ] Contact the media\n" +
        "\n" +
        "### Emoji\n" +
        "That is so funny! :joy:\n" +
        "(See also [Copying and Pasting Emoji](https://www.markdownguide.org/extended-syntax/#copying-and-pasting-emoji))\n" +
        "\n" +
        "### Highlight\n" +
        "I need to highlight these ==very important words==.\n" +
        "\n" +
        "### Subscript\n" +
        "H~2~O\n" +
        "\n" +
        "### Superscript\n" +
        "X^2^",
        language: 'markdown'
    });
    monaco.editor.setTheme('vs-dark');
});

async function fetchParser(){
    try{
        const response = await fetch("/parser.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(window.editor.getValue().replace("\n", "\r\n")),
        });
        if (!response.ok) {
            throw new Error(`${response.status} ${response.statusText}`);
        }
        return response.text();
    }catch(error){
        throw (error);
    }
}

function escapeHTML(unsafe){
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }

function renderContent(){
    fetchParser()
    .then((data) => {
        const containerElement = document.getElementById("converted-container");
        const checkedRadioName = document.querySelector('input[name="flexRadio"]:checked').getAttribute("id");
        if(checkedRadioName == "HTMLRadio"){
            const preDOM = document.createElement("pre");
            const codeDOM = document.createElement("code");
            containerElement.innerHTML = "";
            codeDOM.innerHTML = escapeHTML(data);
            containerElement.appendChild(preDOM);
            preDOM.appendChild(codeDOM);
        } else {
            containerElement.innerHTML = data;
        }
    });
};

function downloadContent(){
    //#4 FIX ME
    const containerElement = document.getElementById("converted-container");
    const checkedRadioName = document.querySelector('input[name="flexRadio"]:checked').getAttribute("id");
    let outputContent;
    let downloadFormat = ".md";

    if(checkedRadioName == "HTMLRadio"){
        outputContent = containerElement.children[0].children[0].innerHTML;
        downloadFormat = ".html";
    } else {
        outputContent = window.editor.getValue();
    }
    const blob = new Blob([outputContent], { type: "octet-stream"});
    const href = URL.createObjectURL(blob);
    const a = Object.assign(document.createElement("a"), {
        href,
        style: "display:none",
        download: "download" + downloadFormat,
    });
    document.body.appendChild(a);
    a.click();
    URL.revokeObjectURL(href);
    a.remove();
};
