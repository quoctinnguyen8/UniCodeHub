require.config({ paths: { 'vs': 'https://unpkg.com/monaco-editor@0.34.0/min/vs' } });
require(['vs/editor/editor.main'], function () {
    const jsCode = `// language javascript
function helloWorld() {

    console.log("Hello, World!");

}`;

    const cCode = `// language c
#include <stdio.h>

int main() {


    return 0;
}
`;

    const cppCode = `// language cpp
#include <iostream>
#include <string>

using namespace std;
int main() {
    cout << "Hello, World!" << endl;
    return 0;
}

`;
    const csharpCode = `// laguage csharp
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace HelloWorld
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Hello, World!");
        }
    }
}
`;

    const pythonCode = `# langguage python
print("Hello, World!")
`;

    let editor = monaco.editor.create(document.getElementById('editor'), {
        value: jsCode,
        language: 'javascript',
        theme: 'vs',
        automaticLayout: true
    });

    //đổi ngôn ngữ
    document.getElementById('languageSelect').addEventListener('change', function (e) {
        const language = e.target.value;
        let code = '';
        if (language === 'javascript') {
            code = jsCode;
        } else if (language === 'c') {
            code = cCode;
            monaco.editor.setModelLanguage(editor.getModel(), 'cpp');
        } else if (language === 'cpp') {
            code = cppCode;
            monaco.editor.setModelLanguage(editor.getModel(), 'cpp');
        } else if (language === 'csharp') {
            code = csharpCode;
        } else if (language === 'python') {
            code = pythonCode;
        }
        editor.setValue(code);
        monaco.editor.setModelLanguage(editor.getModel(), language);
    });

    // đổi màu nềnnền
    document.getElementById('themeSelect').addEventListener('change', function (e) {
        monaco.editor.setTheme(e.target.value);
    });
});