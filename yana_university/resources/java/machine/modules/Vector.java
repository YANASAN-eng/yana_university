package modules;

/**
 * ベクトルに関する基本演算の集まり
 */
public class Vector {
    // ベクトルの和を計算
    public double[] add(double[]... vectors) throws Exception {
        if (vectors.length == 0) {
            throw new Exception("少なくとも一つはベクトルを指定してください。");
        } else {
            int length = vectors[0].length;
            for (int i = 0; i < vectors.length; i++) {
                if (vectors[i].length != length) {
                    throw new Exception("ベクトルの次元が一致しません。");
                }
            }
            double[] result = new double[length];
            for (int i = 0; i < vectors.length; i++) {
                for (int j = 0; j < length; j++) {
                    result[j] = result[j] + vectors[i][j];
                }
            }
            return result;
        }
    }
    // スカラー積
    public double[] scalar(double alpha, double vector[]){
        int length = vector.length;
        double[] result = new double[length];
        for (int i = 0; i < length; i++) {
            result[i] = alpha * vector[i];
        }
        return result;
    }
    // 内積
    public double inner(double A[], double B[]) throws Exception {
        if (A.length != B.length) {
            throw new Exception("ベクトルの次元が異なります。");
        } else {
            double result = 0.0;
            for (int i = 0; i < A.length; i++) {
                result = result + A[i] * B[i];
            }
            return result;
        }
    }
    // ベクトルを表示
    public void display(String str, double vector[]){
        System.out.print(str + ":");
        for (int i = 0; i < vector.length; i ++) {
            System.out.print(vector[i] + " ");
        }
        System.out.println("");
    }
    public void display(double vector[]){
        System.out.print("ベクトル:");
        for (int i = 0; i < vector.length; i ++) {
            System.out.print(vector[i] + " ");
        }
        System.out.println("");
    }
}