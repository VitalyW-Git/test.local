const path = require("path")

module.exports = {
    runtimeCompiler: true,
    outputDir: path.resolve(__dirname, '../../components/widget/vue/assets'),
    filenameHashing: false,
}