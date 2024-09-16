package modules;

public class Operator {
    private static double h = 1e-4;
    // Affine変換
    public double[] Affine(double[] X, double[][] W, double[] b){
        double[] result = new double[W[0].length];
        for (int j = 0; j < W[0].length; j++) {
            for (int i = 0; i < W.length; i++) {
                result[j] = result[j] + X[i] * W[i][j];
            }
            result[j] = result[j] + b[j];
        }
        return result;
    }
    // 微分
    public double numericalDiff(Function f, double x){
        return (f.apply(x + h) - f.apply(x - h)) / (2 * h);
    }
    /**
     * 層を接続する処理
     * 
     * 第一引数：入力データ
     * 第二引数：層(可変)
     * 戻り値：出力
     */
    public double[] conection(double[] x, Layer... layers){
        int layer_num = layers.length;
        layers[0].input = x;
        double[] output;
        for (int i = 0; i < layer_num; i++) {
            if (i < layer_num - 1) {
                layers[i + 1].input = this.Affine(layers[i].input, layers[i].weight, layers[i].bias);
                for (int k = 0; k < layers[i].functions.length; k++) {
                    layers[i + 1].input[k] = layers[i].functions[k].apply(layers[i + 1].input[k]);
                } 
            }
        }
        output = this.Affine(layers[layer_num - 1].input, layers[layer_num - 1].weight, layers[layer_num - 1].bias);
        for (int k = 0; k < layers[layer_num - 1].functions.length; k++) {
            output[k] = layers[layer_num - 1].functions[k].apply(layers[layer_num - 1].input[k]);
        } 
        return output;
    }
    /**
     * 二乗平均誤差
     * 
     * 第一引数　出力
     * 第二引数　目的
     * 戻り値　スカラー
     */
    public double Error(double[] output, double[] target){
        int length = output.length;
        double error = 0;
        for (int i = 0; i < length; i++) {
            error = error + (output[i] - target[i]) * (output[i] - target[i]);
        }
        error = Math.sqrt(error / length);
        return error;
    }
}