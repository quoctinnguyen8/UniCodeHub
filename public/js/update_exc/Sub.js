document.addEventListener('alpine:init', () => {
    Alpine.data('languagedata', () => ({
        optionValue: 'javascript',
        init() {

            require.config({
                paths: {
                    'vs': '/lib/monaco-editor/min/vs',
                }
            });
            require(['vs/editor/editor.main'], () => {
                const editor = monaco.editor.create(document.getElementById('editor'), {
                    value: "// Viết mã của bạn ở đây" ,
                    language: 'javascript',
                    theme: 'vs-light',
                    automaticLayout: true,
                    fontSize: 16,
                });

                document.getElementById('submit').addEventListener('click', () => { // Xử lý sự kiện click nút nộp bài
                    const code = editor.getValue();
                    document.getElementById('submission').value = code;
                    confirm('Bạn có chắc chắn muốn nộp bài không?') ? document.getElementById('form').submit() : null;
                });
                let languageSelect = document.getElementById('Submission_id');
                languageSelect.addEventListener('change', (event) => {
                    this.optionValue = event.target.value;
                    console.log(this.optionValue); 
                });
            });
        }        
    }))
})